<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Table Name
    protected $table = 'categories';
    // Primary Key
    public $primaryKey = 'id';//unnecessery?


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the artefacts for the catagory.
     */
    public function atrefacts()
    {
        return $this->belongsToMany('App\Artefact');
    }


}
