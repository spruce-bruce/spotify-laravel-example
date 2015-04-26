<?php

namespace SpotifyExample\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {

    /**
     * The "snake case", plural name of the class will be used as the table
     * name unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'albums';

    /**
     * Eloquent assumes you have a primary key called 'id'. Override the default here.
     * Laravel does not support composite primary keys. BOOOOOOOOOO.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Mass assignment is the term Laravel uses for assigning arrays of values
     * in a constructor. IE, new Album(['id', 'xyz', 'foo'])
     *
     * The fillable array is a white list of values that can be fileld this way.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'type',
        'album_type',
        'href',
        'uri'
    ];

    /**
     * guarded is the inverse of fillable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * If you wish to specify your own keys (ie, not using auto-increment),
     * set the incrementing property on your model to false.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * By default, Eloquent will maintain the created_at and updated_at columns
     * on your database table automatically.
     *
     * @var bool
     */
    public $timestamps = false;

}
