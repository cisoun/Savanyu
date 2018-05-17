<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ArtworkUpload;
use App\Upload;

class Artwork extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artworks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'category',
        'description',
        'type',
        'text',
        'video',
        'audio',
        'columns'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    
    public function getImagesAttribute()
    {
        $images = [];
        $uploads = $this->uploads()->get();
        
        for ($i = 0; $i < count($uploads); $i++)
        {
            $upload = Upload::find($uploads[$i]->id);
            $images[] = $upload;
        }
        return $images;
    }
    
    public function getThumbnailAttribute()
    {
        $upload = $this->uploads()->first()->upload_id;
        $thumbnail = Upload::find($upload);
        return $thumbnail;
    }
    
    public function uploads()
    {
        return $this->hasMany('App\ArtworkUpload');
    }
}
