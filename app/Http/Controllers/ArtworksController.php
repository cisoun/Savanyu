<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;
use App\ArtworkUpload;
use App\Upload;

class ArtworksController extends Controller
{
    public function delete(Request $request, $id)
    {
        Artwork::destroy($id);
    }
    
    public function index(Request $request)
    {
        return Artwork::all();
    }
    
    public function showPaintings(Request $request)
    {
        $paintings = Artwork::where('category', 0)->get();
        return view('travaux.peinture', ['paintings' => $paintings]);    
    }
    
    /**
    * Store a new artwork.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:artworks,title',
        ]);

        $artwork = new Artwork;
        $artwork->title = $request->title;
        $artwork->category = $request->category;
        //$artwork->type = $request->type;
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
            //$upload->type = explode('/', mime_content_type('public/uploads/' . $fileName))[0];
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
    
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:artworks,title,' . $id,
        ]);
        
        $artwork = Artwork::find($id);
        return tap($artwork)->update($request->all());
    }
    
    public function upload(Request $request, Artwork $artwork)
    {
        $artwork->update(Request::all());
    }
}
