<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    // Table Name
    protected $table = 'metadata';//same name could make problems
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
     * Get the artafact for this single metadata.
     */
    public function artefact(){
        return $this->belongsTo('App\Artefact');
    }


}
