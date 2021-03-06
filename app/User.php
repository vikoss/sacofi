<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }
    
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true; 
            }   
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        if( $this->roles()->where('name', 'admin')->first() ){
            return true;
        }
        return false;
    }

    public function isClient()
    {
        if( $this->roles()->where('name', 'client')->first() ){
            return true;
        }
        return false;
    }

    public function isAccountant()
    {
        if( $this->roles()->where('name', 'accountant')->first() ){
            return true;
        }
        return false;
    }

    // Cuales son los reportes que tiene un cliente
    public function reports()
    {
        return $this->hasMany('App\Report', 'client_id');
    }

    // Quienes son los clientes que tiene un contador
    public function clients()
    {
        return $this->hasMany('App\User', 'accountant_id');
    }

    // Quien es el contador de un cliente
    public function accountant()
    {
        return $this->belongsTo('App\User');
    }
}
