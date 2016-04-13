<?php

namespace App;

use App\Models\Following;
use App\Models\UserProfile;
use GridPrinciples\Friendly\Traits\Friendly;
use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable implements SluggableInterface
{
    use Friendable;
    use Messagable;
    use SluggableTrait;
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'password'];
    protected $sluggable = ['build_from' => 'name', 'save_to' => 'slug'];
    protected $dates = ['deleted_at'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function follows()
    {
       return $this->belongsToMany(Self::class, 'follows', 'follower_id', 'followed_id');
   }

    public function thisUser($id)
    {
        $user = User::findorFail($id);
        return $user;
    }

    public function scopeUserImage()
    {
        return $this->profile->thumbnail ?: '/assets/frontend/placeholder/speaker-placeholder.png';
    }

}
