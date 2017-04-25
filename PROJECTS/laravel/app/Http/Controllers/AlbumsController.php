<?php

namespace LaraCourse\Http\Controllers;

use function abort;
use Auth;
use function compact;
use function config;
use function dd;
use function env;
use function getenv;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use LaraCourse\Models\Album;
use DB;
use LaraCourse\Models\Photo;
use function returnArgument;
use Storage;
use LaraCourse\Http\Requests\AlbumRequest;
use LaraCourse\Http\Requests\AlbumUpdateRequest;
class AlbumsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only(['create','edit']);
       // $this->middleware('auth')->except(['index']);
    }

    public function index(Request $request)
    {
    
        //DB::table('albums')->  Album::
        $queryBuilder = Album::orderBy('id', 'DESC')->withCount('photos');
       
        $queryBuilder->where('user_id', Auth::user()->id);

        if ($request->has('id')) {
            $queryBuilder->where('id', '=', $request->input('id'));
        }
        if ($request->has('album_name')) {
            $queryBuilder->where('album_name', 'like', $request->input('album_name') . '%');
        }

        $albums = $queryBuilder->paginate(env('IMG_PER_PAGE'));
     
        return view('albums.albums', ['albums' => $albums]);


    }

    public function delete( Album $album)
    {
     //Storage
        $thumbNail = $album->album_thumb;
        $disk = config('filesystems.default');
     
        $res = $album->delete();
        if($res){
          if($thumbNail && Storage::disk($disk)->has($thumbNail))   {
              Storage::disk($disk)->delete($thumbNail);
          }
        }
        return '' . $res;
    }

    public function edit( $id)
    {
        $album = Album::find($id);
        //Auth::user()->can('update', $album);
        $this->authorize($album);
      /*   dd('hi');
        if(\Gate::denies('manage-album', $album)){
            abort(401, 'Unauthorized');
        }
       
        if($album->user->id !== Auth::user()->id){
            abort(401, 'Unauthorized');
        }
      */
        return view('albums.editalbum')->with('album', $album);
    }

    /**
     * @param $id
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store( $id, AlbumUpdateRequest $req)
    {
       
        $album = Album::find($id);
        $this->authorize('update', $album);
       
        $album->album_name = request()->input('name');
        $album->description = request()->input('description');
        $album->user_id = $req->user()->id;
        $this->processFile($id, $req, $album);
        $res = $album->save();


        $messaggio = $res ? 'Album con id = ' . $album->album_name . ' Aggiornato' : 'Album ' . $album->album_name . ' Non aggiornato';
        session()->flash('message', $messaggio);
        return redirect()->route('albums');
    }

    public function create()
    {
       
        $album = new Album();
        return view('albums.createalbum', ['album' => $album]);
    }

    public function save( AlbumRequest $request)
    {
       
        $album = new Album();
        $album->album_name = $request->input('name');
        $album->album_thumb = '';
        $album->description = $request->input('description');
        $album->user_id =  $request->user()->id;;
       
         
        $res = $album->save();
        if($res){
             if($this->processFile($album->id, request(), $album)){
                 $album->save(); 
             }
        }
      
        
        $name = request()->input('name');
        $messaggio = $res ? 'Album   ' . $name . ' Created' : 'Album ' . $name . ' was not crerated';
        session()->flash('message', $messaggio);
        return redirect()->route('albums');
    }

    /**
     * @param $id
     * @param Request $req
     * @param $album
     */
    public function processFile($id, Request $req, &$album)
    {
        if(!$req->hasFile('album_thumb') ){
            return false;
        }
        $file = $req->file('album_thumb');
         if(!$file->isValid()){
             return false; 
         }
                  //$fileName = $file->store(env('ALBUM_THUMB_DIR'));
                $fileName = $id . '.' . $file->extension();
                $file->storeAs(env('ALBUM_THUMB_DIR'), $fileName);

                $album->album_thumb = env('ALBUM_THUMB_DIR') . $fileName;
            
           return  true;
        
        
       
    }
   public  function getImages( Album $album)
   {
      
       $images = Photo::where('album_id',$album->id )->latest()->paginate(env('IMG_PER_PAGE'));
       //$images=  $album->photos;
     
       return view('images.albumimages',compact('album','images'));
      
   }
   public function  show( Album $album){
       
        dd($album);
   }
  
}