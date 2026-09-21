<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    //какво можно да пише и променя user
    protected $fillable = [
        'name',
        'username',
        'image',
        'bio',
        'email',
        'password',
    ];
    //защита за да не появлявляват в отговори в API
       protected $hidden = [
        'password',
        'remember_token',
    ];
      public function imageUrl()
    {
        //проверява размери на аватар
        $media = $this->getFirstMedia('avatar');
        
        if ($media->hasGeneratedConversion('avatar')) {
            return $media->getUrl('avatar');
        }
        return $media->getUrl();
    }
    public function getAvatarUrlAttribute()
    {
        //ако няма аватара дефолт снимка 
        return $this->getFirstMediaUrl('avatar') ?: '/default-avatar.png';
    }
    public function avatarUrl(): string
    {
        //URL чрез Storage
        return $this->image
            ? Storage::url($this->image)
            : '/default-avatar.png';
    }
}
