<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Table Name
    protected $table = 'categories';
    // Primary Key
    public $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the artefacts for the category.
     */
    public function artefacts()
    {
        return $this->belongsToMany('App\Artefact');
    }
}
