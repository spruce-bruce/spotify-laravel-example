<?php

namespace SpotifyExample\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {
    const SMALL_SIZE = 64;
    const MEDIUM_SIZE = 300;
    const LARGE_SIZE = 640;

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

    public function getSmallImageUrl() {
        $this->getImageUrl(self::SMALL_SIZE);
    }

    public function getLargeImageUrl() {
        $this->getImageUrl(self::LARGE_SIZE);
    }

    public function getMediumImageUrl() {
        $this->getImageUrl(self::MEDIUM_SIZE);
    }

    private function getImageUrl($size) {
        foreach ($this->images as $image) {
            if ($image->width === $size) return $image->url;
        }

        return false;
    }

    /**
     * Defining that an album can have many images
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        /*
         * Eloquent assumes the foreign key of the relationship based on the model name (album_id in this case).
         * If you wish to override this convention, you may pass a second argument to the hasOne method.
         * Furthermore, you may pass a third argument to the method to specify which local column that
         * should be used for the association
         */
        return $this->hasMany('SpotifyExample\Models\Image');
    }
}
