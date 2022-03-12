<?php declare(strict_types=1);

namespace App\Models;

use App\Events\Row\RowCreatedEvent;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Row
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $date
 * @method static \Illuminate\Database\Eloquent\Builder|Row newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Row newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Row query()
 * @method static \Illuminate\Database\Eloquent\Builder|Row whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Row whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Row whereName($value)
 * @mixin \Eloquent
 */
class Row extends Model
{
    const IMPORT_COUNT_CACHE_KEY = 'import_count_cache_key';

    public $timestamps = false;

    protected $dates = [
        'date',
    ];

    protected $dispatchesEvents = [
        'created' => RowCreatedEvent::class,
    ];

}
