<?php

namespace App\Http\Livewire;

use App\Actions\Jetstream\DeleteUser;
use App\Mail\ApproveUserAttendance;
use App\Mail\RemindUserOfTerms;
use App\Models\MusicalInstrument;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Spatie\Permission\Models\Role;

class AttendantTable extends DataTableComponent {

    use LivewireAlert;

    public bool $columnSelect = true;
    public bool $rememberColumnSelection = false;
    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'desc';
    public bool $viewingModal = false;

    public int $currentModel = 0;

    public const NO_ROLES = 'NONE';

    public function columns(): array {
        return [
            Column::make(__('ID'), "id")
                ->excludeFromSelectable()
                ->sortable(),
            Column::make(__('Name'), "name")
                ->excludeFromSelectable()
                ->searchable()
                ->sortable(),
            Column::make(__('Email'), "email")
                ->searchable()
                ->sortable(),
            Column::make(__('Musical Instrument'), "musicalInstrument.name")
                ->selected(),
            Column::make(__('Teacher'), "teacher")
                ->sortable(),
            Column::make(__('City'), "city")
                ->searchable()
                ->sortable(),
            Column::make(__('Age'), "birthday.age")
                ->sortable(),
            Column::make(__('Role'), "role")
                ->selected(),
            Column::make(__('Status'))
                ->excludeFromSelectable(),
            Column::make(__('Created'), "created_at")
                ->selected()
                ->sortable(),
            Column::blank()
                ->excludeFromSelectable(),
        ];
    }

    public function filters(): array {
        return [
            'musical_instrument' => Filter::make(__('Musical Instrument'))
                ->select(MusicalInstrument::all()->sortBy('name')->pluck('name', 'id')->all()),
            'role' => Filter::make(__('Role'))
                ->select(Role::all()->sortBy('name')->pluck('name', 'id')->prepend(__('New Registrations'), self::NO_ROLES)->all()),
            'status' => Filter::make(__('Status'))
                ->select([
                    'email_not_verified' => __('Email not verified'),
                    'email_verified' => __('Email verified'),
                    'video_uploaded' => __('Video uploaded'),
                ]),
            'created_at' => Filter::make(__('Created'))
                ->date(),
        ];
    }


    public function query(): Builder {
        return User::query()
            ->when($this->getFilter('musical_instrument'), fn($query, $instrumentId) => $query->where('musical_instrument_id', $instrumentId))
            ->when($this->getFilter('role'), function ($query, $roleId) {
                if ($roleId == self::NO_ROLES)
                    $query->withCount('roles')->has('roles', 0);
                else
                    $query->whereRelation('roles', 'role_id', $roleId);
            })
            ->when($this->getFilter('created_at'), fn($query, $created_at) => $query->whereDate('created_at', $created_at));
    }

    public function rowView(): string {
        return 'livewire-tables.rows.attendant_table';
    }

    public function modalsView(): string {
        return 'livewire-tables.modals.delete_user';
    }

    public function remindUserOfTerms(int $userId) {
        $user = User::findOrFail($userId);
        Mail::to($user)->send(new RemindUserOfTerms($user));
        $this->alert('success', __('Reminder successfully sent.'));
    }

    public function approveUserAttendance(int $userId) {
        $user = User::findOrFail($userId);
        $user->assignRole('Student');
        Mail::to($user)->send(new ApproveUserAttendance($user));
        $this->alert('success', __('Attendance successfully approved.'));
    }

    public function deleteUser(int $userId, DeleteUser $deleter) {
        $this->resetErrorBag();
        $user = User::findOrFail($userId);
        $deleter->delete($user);
        $this->resetModal();
        $this->alert('success', __('User successfully deleted.'));
    }

    public function viewDeleteUserModal($modelId): void {
        $this->viewingModal = true;
        $this->currentModel = $modelId;
    }

    public function resetModal(): void {
        $this->reset('viewingModal', 'currentModel');
    }
}
