<?php

namespace App\Models;

use Cloudinary;
use Cloudinary\Asset\Image;
use Cloudinary\Transformation\FocusOn;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Resize;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable implements MustVerifyEmail {
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasRoles;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthday',
        'musical_instrument_id',
        'nickname',
        'city',
        'teacher'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'datetime:Y-m-d',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function video(): HasOne {
        return $this->hasOne(Video::class);
    }

    public function displayName(): string {
        return $this->nickname ?? $this->name;
    }

    public function musicalInstrument(): BelongsTo {
        return $this->belongsTo(MusicalInstrument::class);
    }

    public function age(): int {
        return $this->birthday->age;
    }

    /**
     * Update the user's profile photo.
     *
     * @param UploadedFile $photo
     */
    public function updateProfilePhoto(UploadedFile $photo) {
        tap($this->profile_photo_path, function ($previous) use ($photo) {
            $response = Cloudinary::upload($photo->getRealPath())->getPublicId();
            $this->forceFill([
                'profile_photo_path' => $response
            ])->save();

            if ($previous) {
                Cloudinary::destroy($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     */
    public function deleteProfilePhoto() {
        if (!Features::managesProfilePhotos() || !$this->profile_photo_path) {
            return;
        }

        Cloudinary::destroy($this->profile_photo_path);

        $this->forceFill([
            'profile_photo_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute(): string {
        if (!$this->profile_photo_path) {
            return $this->defaultProfilePhotoUrl();
        }

        $image = new Image($this->profile_photo_path);
        return $image->resize(Resize::thumbnail()->width(200)->gravity(Gravity::focusOn(FocusOn::face())))->signUrl()->toUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl(): string {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->displayName()) . '&color=7F9CF5&background=EBF4FF';
    }
}
