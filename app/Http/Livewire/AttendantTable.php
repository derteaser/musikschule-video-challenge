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
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Spatie\Permission\Models\Role;

class AttendantTable extends DataTableComponent {

    use LivewireAlert;

    protected $model = User::class;

    public bool $viewingModal = false;

    public int $currentModel = 0;

    public const NO_ROLES = 'NONE';

    public function configure(): void {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setAdditionalSelects(['users.email_verified_at as email_verified_at']);
        //$this->setRememberColumnSelectionDisabled();
    }

    public function columns(): array {
        return [
            Column::make(__('ID'), "id")
                ->excludeFromColumnSelect()
                ->sortable(),
            Column::make(__('Name'), "name")
                ->excludeFromColumnSelect()
                ->searchable()
                ->sortable()
                ->view('livewire-tables.columns.user-avatar-name'),
            Column::make(__('Email'), "email")
                ->searchable()
                ->sortable()
                ->view('livewire-tables.columns.email')
                ->deselected(),
            Column::make(__('Musical Instrument'), "musical_instrument_id")
                ->format(fn($value, User $row) => $row->musicalInstrument->name ?? '-'),
            Column::make(__('Teacher'), "teacher")
                ->deselected()
                ->sortable(),
            Column::make(__('City'), "city")
                ->deselected()
                ->searchable()
                ->sortable(),
            Column::make(__('Age'), "birthday")
                ->format(fn($value) => $value->age)
                ->deselected()
                ->sortable(),
            Column::make(__('Role'), "roles")
                ->label(fn(User $row) => view('livewire-tables.columns.user-roles')->withRow($row)),
            Column::make(__('Status'))
                ->label(fn(User $row) => view('livewire-tables.columns.user-status')->withRow($row))
                ->excludeFromColumnSelect(),
            Column::make(__('Created'), "created_at")
                ->format(fn($value) => $value->format('d.m.Y'))
                ->sortable(),
            Column::make('')
                ->label(fn(User $row) => view('livewire-tables.columns.user-actions')->withRow($row))
                ->hideIf(!auth()->user()->hasAnyRole(['Admin', 'Superadmin']))
                ->excludeFromColumnSelect(),
        ];
    }

    public function filters(): array {
        return [
            SelectFilter::make(__('Musical Instrument'), 'musical_instrument')
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('musical_instrument_id', $value);
                })
                ->options(MusicalInstrument::all()->sortBy('name')->pluck('name', 'id')->all()),
            SelectFilter::make(__('Role'), 'role')
                ->filter(function (Builder $builder, string $value) {
                    if ($value == self::NO_ROLES)
                        $builder->withCount('roles')->has('roles', 0);
                    else
                        $builder->whereRelation('roles', 'role_id', $value);
                })
                ->options(Role::all()->sortBy('name')->pluck('name', 'id')->prepend(__('New Registrations'), self::NO_ROLES)->all()),
            SelectFilter::make(__('Status'), 'status')
                ->filter(function (Builder $builder, string $value) {
                    switch ($value) {
                        case 'video_uploaded':
                            $builder->whereHas('video');
                            break;
                        case 'email_not_verified':
                            $builder->whereNull('email_verified_at');
                            break;
                        case 'email_verified':
                            $builder->whereNotNull('email_verified_at')->whereDoesntHave('video');
                            break;
                        default:
                            break;
                    }
                })
                ->options([
                    'email_not_verified' => __('Email not verified'),
                    'email_verified' => __('Email verified'),
                    'video_uploaded' => __('Video uploaded'),
                ]),
            DateFilter::make(__('Created'))
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereDate('created_at', $value);
                }),
        ];
    }

    public function customView(): string {
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
