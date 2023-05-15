<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SearchableTrait;
    use HasRoles;
    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'users.first_name' => 10,
            'users.last_name' => 10,
            'users.email' => 5,
            'users.patronymic' => 5,
        ]
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'patronymic',
        'email',
        'phone_number',
        'is_admin',
        'password',
        'email_verified_at',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    public function review()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function getRoleAttribute()
    {
        if ($this->is_admin) {
            return 'Администратор';
        }
        return 'Инженер';
    }

    public function getEditLinkAttribute()
    {
        return    "/user/" . $this->id . "/edit";
    }

    public function getFioAttribute()
    {
        return   @$this->last_name . " " . @$this->first_name . " " . @$this->patronymic;
    }

    public function getFioShortAttribute()
    {
        return     $this->last_name . " " .  mb_substr($this->first_name, 0, 1) . ". " . mb_substr($this->patronymic, 0, 1) . ".";
    }

    public function getCanDeletedAttribute()
    {
        if ($this->review->count() > 0) {
            return false;
        }
        return true;
    }


    
    public function getUserRolesAttribute()
    {

        $roles_string='';
        $roles = $this->getRoleNames();
        foreach ($roles as $key  ) {
            $roles_string.=$key . ' ';
        }
        return $roles_string;
    }
}
