<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtworkUpload extends Model
{
    public $timestamps = false;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artworks_uploads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artwork_id',
        'upload_id',
        'index'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    
    public function upload()
    {
        return $this->hasMany('App\Upload');
    }
}
