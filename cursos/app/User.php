<?php

namespace App;

/*use Illuminate\Contracts\Auth\MustVerifyEmail;*/

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'type', 'password',
    ];

    const ROLE_SUPERADMIN = 'ROLE_SUPERADMIN';
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'student';

    private const ROLES_HIERARCHY = [
        self::ROLE_SUPERADMIN => [self::ROLE_ADMIN],
        self::ROLE_ADMIN => [self::ROLE_USER],
        self::ROLE_USER => []
    ];

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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /*Relacion de uno a muchos, un usuario tiene varios cursos*/
    public function course()
    {
        return $this->belongsToMany('App\Course', 'registers')->withPivot('progress', 'score');
    }

    /*Relacion de muchos a muchos, entre usuario y cursos*/
    public function courses()
    {
        return $this->hasMany('App\Course');

    }

    public function isGranted($type)
    {
        if ($type === $this->type) {
            return true;
        }
        return self::isRoleInHierarchy($type, self::ROLES_HIERARCHY[$this->type]);
    }

    private static function isRoleInHierarchy($type, $type_hierarchy)
    {
        if (in_array($type, $type_hierarchy)) {
            return true;
        }
        foreach ($type_hierarchy as $type_included) {
            if (self::isRoleInHierarchy($type, self::ROLES_HIERARCHY[$type_included])) {
                return true;
            }
        }
        return false;
    }
}
