<?php


namespace App;


class ArtefactUser extends Model
{
    // Table Name
    protected $table = 'artefact_user';
    // Primary Key
    public $primaryKey = 'artefact_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
