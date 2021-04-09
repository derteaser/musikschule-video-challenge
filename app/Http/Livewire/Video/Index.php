<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component {

    /** @var Collection */
    public $videos;

    /** @var int */
    public $musicalInstrumentId;

    /** @var string|int */
    public $age;

    /** @var string */
    public $searchTerm;

    public function render() {
        $this->videos = $this->prepareVideos();

        return view('livewire.video.index');
    }

    private function prepareVideos(): Collection {
        $query = Video::query();

        if ($this->searchTerm) {
            $query = Video::where('name', 'like', '%' . $this->searchTerm . '%');
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

                $start = Carbon::now()->startOfDay()->subYears($from);
                $end = Carbon::now()->endOfDay()->subYears($to)->addYear()->subDay(); // plus 1 year minus a day

                $query->select('id')->from('users')->whereBetween('birthday', [$start, $end]);
            });
        }

        if (!Auth::user()->can('hide video')) {
            $query->where('isHidden', false);
        }

        $query->orderByDesc('created_at');

        return $query->get();
    }
}
