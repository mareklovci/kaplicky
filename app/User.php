<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Table Name
    protected $table = 'users';
    // Primary Key
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'email', 'password', 'register_hash'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token', 'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the artefacts for the user.
     */
    public function likesArtefacts()
    {
        return $this->belongsToMany('App\Artefact');
    }

    /**
     * Get the metadata for the user.
     */
    public function likesMetadata()
    {
        return $this->belongsToMany('App\Metadata');
    }
}
