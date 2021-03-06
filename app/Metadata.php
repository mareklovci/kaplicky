<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    // Table Name
    protected $table = 'metadata';
    // Primary Key
    public $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the artefact for this single metadata.
     */
    public function artefact(){
        return $this->belongsTo('App\Artefact');
    }

    /**
     * Get the users for the metadata.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
