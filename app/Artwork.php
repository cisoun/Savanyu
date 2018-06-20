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
        'text',
        'video',
        'audio',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'images'
    ];
    
    
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
        if ($this->uploads()->count() == 0)
            return new Upload;
            
        $upload = $this->uploads()->first()->upload_id;
        $thumbnail = Upload::find($upload);
        return $thumbnail;
    }
    
    public function uploads()
    {
        return $this->hasMany('App\ArtworkUpload');
    }
}
