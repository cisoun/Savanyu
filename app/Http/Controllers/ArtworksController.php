<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;
use App\ArtworkUpload;
use App\Upload;

class ArtworksController extends Controller
{
    /**
    * Store a new artwork.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            //'email' => 'required|email|unique:users'
        ]);

        $artwork = new Artwork;
        $artwork->title = $request->title;
        $artwork->category = $request->category;
        $artwork->type = $request->type;
        $artwork->save();

        $i = 0;
        for ($i = 0; ; $i++)
        {
            $file = 'file' . $i;

            if (!$request->hasFile($file))
            {
                break;
            }

            $fileName = sha1(time());
            $request->file($file)->move('public/uploads', $fileName);

            $upload = new Upload;
            $upload->type = explode('/', mime_content_type('public/uploads/' . $fileName))[0];
            $upload->name = $fileName;
            $upload->save();

            $artworkUpload = new ArtworkUpload;
            $artworkUpload->artwork_id = $artwork->id;
            $artworkUpload->upload_id = $upload->id;
            $artworkUpload->index = $i;
            $artworkUpload->save();
        }


        return $request->all();
        //return Artwork::create($request->all());
    }
}
