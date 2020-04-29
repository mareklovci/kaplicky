<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artefact extends Model
{
    // Table Name
    protected $table = 'artefacts';
    // Primary Key
    public $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the metadata for the artefact.
     */
    public function metadata()
    {
        return $this->hasMany('App\Metadata');
    }

    /**
     * Get the categories for the artefact.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    /**
     * Get the users for the artefact.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
