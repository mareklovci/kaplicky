<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class ArtefactCategory extends Model
{
    // Table Name
    protected $table = 'artefact_category';
    // Primary Key
    public $primaryKey = 'artefact_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
