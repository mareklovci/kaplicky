<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artefact extends Model
{
    // Table Name
    protected $table = 'artafacts';//unnecessery?
    // Primary Key
    public $primaryKey = 'id';//unnecessery?

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'likes' => 0,
    ];

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
     * Get the main category for the artefact.
     */
    public function main_category()
    {
        return $this->hasOne('App\Category', 'main_category_id');
    }

    /**
     * Get the categories for the artefact.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }




}
