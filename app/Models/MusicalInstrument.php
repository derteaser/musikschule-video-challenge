<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Sushi\Sushi;

/**
 * @mixin IdeHelperMusicalInstrument
 */
class MusicalInstrument extends Model {

    use Sushi;

    protected array $rows = [
        ['id' => 1, 'name' => 'Klavier'],
        ['id' => 2, 'name' => 'Keyboard'],
        ['id' => 3, 'name' => 'Cembalo'],
        ['id' => 4, 'name' => 'Orgel'],
        ['id' => 5, 'name' => 'Akkordeon'],
        ['id' => 6, 'name' => 'Blockflöte'],
        ['id' => 7, 'name' => 'Querflöte'],
        ['id' => 8, 'name' => 'Oboe'],
        ['id' => 9, 'name' => 'Klarinette'],
        ['id' => 10, 'name' => 'Saxophon'],
        ['id' => 11, 'name' => 'Fagott'],
        ['id' => 12, 'name' => 'Trompete'],
        ['id' => 13, 'name' => 'Flügelhorn'],
        ['id' => 14, 'name' => 'Tenorhorn'],
        ['id' => 15, 'name' => 'Euphonium'],
        ['id' => 16, 'name' => 'Bariton'],
        ['id' => 17, 'name' => 'Posaune'],
        ['id' => 18, 'name' => 'Tuba'],
        ['id' => 19, 'name' => 'Violine'],
        ['id' => 20, 'name' => 'Viola'],
        ['id' => 21, 'name' => 'Violoncello'],
        ['id' => 22, 'name' => 'Kontrabass'],
        ['id' => 23, 'name' => 'Gambe'],
        ['id' => 24, 'name' => 'Gitarre'],
        ['id' => 25, 'name' => 'E-Gitarre'],
        ['id' => 26, 'name' => 'E-Bass'],
        ['id' => 27, 'name' => 'Schlagzeug'],
        ['id' => 28, 'name' => 'Percussion'],
        ['id' => 29, 'name' => 'Gesang'],
    ];

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
}
