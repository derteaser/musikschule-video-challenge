<?php

namespace App\Models;

use Cloudinary\Asset\Video as CloudinaryVideo;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\Resize;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperVideo
 */
class Video extends Model {
    use HasFactory;

    /** @var int */
    const THUMBNAIL_WIDTH = 1600;
    /** @var int */
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
        'comment',
        'winner',
        'user_id'
    ];

    /**
     * @return User
     */
    public function user(): object {
        return $this->belongsTo(User::class)->first();
    }

    public function thumbnail(): CloudinaryVideo {
        return $this->video()->format(Format::jpg())->resize(new Resize('thumb', self::THUMBNAIL_WIDTH, self::THUMBNAIL_HEIGHT));
    }

    public function video(): CloudinaryVideo {
        return Cloudinary::getVideo($this->cloudinary_public_id);
    }
}
