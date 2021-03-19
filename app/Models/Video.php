<?php

namespace App\Models;

use Cloudinary\Asset\Video as CloudinaryVideo;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\Resize;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class Video
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $cloudinary_public_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Video newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video query()
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCloudinaryPublicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUserId($value)
 * @mixin Eloquent
 */
class Video extends Model
{
    use HasFactory;

    /** @var int  */
    const THUMBNAIL_WIDTH = 1600;
    /** @var int  */
    const THUMBNAIL_HEIGHT = 900;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'cloudinary_public_id',
    ];

    protected $fillable = [
        'name',
        'cloudinary_public_id',
        'description',
        'user_id'
    ];

    /**
     * @return User
     */
    public function user(): object
    {
        return $this->belongsTo(User::class)->first();
    }

    public function thumbnail(): CloudinaryVideo {
        return $this->video()->format(Format::jpg())->resize(new Resize('thumb', self::THUMBNAIL_WIDTH, self::THUMBNAIL_HEIGHT));
    }

    public function video(): CloudinaryVideo
    {
        return new CloudinaryVideo($this->cloudinary_public_id);
    }
}
