<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component {

    use WithPagination;

    /** @var string|int */
    public $musicalInstrumentId = '';

    /** @var string|int */
    public $age = '';

    /** @var string */
    public string $searchTerm = '';

    public function render() {
        return view('livewire.video.index', [
            'videos' => $this->prepareVideos()->paginate(12)
        ]);
    }

    private function prepareVideos(): \Illuminate\Database\Eloquent\Builder {
        $query = Video::query();

        if ($this->searchTerm) {
            $query = Video::where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
        }

        if ($this->musicalInstrumentId) {
            $query->whereIn('user_id', function (Builder $query) {
                $query->select('id')->from('users')->where('musical_instrument_id', $this->musicalInstrumentId);
            });
        }

        if ($this->age) {
            $query->whereIn('user_id', function (Builder $query) {
                switch ($this->age) {
                    case 'to6':
                        $from = 6;
                        $to = 1;
                        break;
                    case 'from20':
                        $from = 100;
                        $to = 20;
                        break;
                    default:
                        $from = $this->age;
                        $to = $this->age;
                        break;
                }

                $start = Carbon::now()->startOfDay()->subYears($from)->subYear();
                $end = Carbon::now()->endOfDay()->subYears($to)->subDay();

                $query->select('id')->from('users')->whereBetween('birthday', [$start, $end]);
            });
        }

        if (!Auth::user()->can('hide video')) {
            $query->where('isHidden', false);
        }

        $query->orderByDesc('created_at');

        return $query;
    }

    public function updatingSearchTerm() {
        $this->resetPage();
    }

    public function updatingAge() {
        $this->resetPage();
    }

    public function updatingMusicalInstrumentId() {
        $this->resetPage();
    }
}
