<?php
use function foo\func;
use Illuminate\Foundation\Auth\User;
use LaraCourse\Models\{Album,Photo};
use LaraCourse\Http\Controllers;
use LaraCourse\Http\Controllers\{
    AlbumsController,
    AlbumCategoryController,
    GalleryController,
    HomeController,
    PageController,
    PhotosControlle,
    VideoController,
    WelcomeController

};
Route::get('allalbums', function(){
    $albums = Album::get();
    $albums->dump();
    $albums->pluck('album_name')->dd();
});

Route::group(
    [
       // 'middleware' => ['auth','verified'],
        'prefix' => 'dashboard'
    ]
    ,
    function () {
        Route::get('/', [AlbumsController::class,'index'])
            ->name('albums');

        Route::get('/', [AlbumsController::class, 'index'])
            ->name('albums');
         Route::get('/albums/create', [AlbumsController::class, 'create'])
             ->name('album.create');
        Route::get('/albums', [AlbumsController::class, 'index'])
            ->name('albums');

        Route::get('/albums/{album}',[AlbumsController::class, 'show'])
            ->where('id', '[0-9]+')
            ->middleware('can:view,album');

        Route::get('/albums/{id}/edit', [AlbumsController::class, 'edit'])
            ->where('id', '[0-9]+')
            ->name('album.edit');
        Route::delete('/albums/{album}', [AlbumsController::class, 'delete'])
            ->name('album.delete')
            ->where('album', '[0-9]+');

//Route::post('/albums/{id}','AlbumsController@store');
        Route::patch('/albums/{id}', [AlbumsController::class, 'store'])->name('album.patch');
        Route::post('/albums', [AlbumsController::class, 'save'])->name('album.save');

        Route::get('/albums/{album}/images', [AlbumsController::class, 'getImages'])
            ->name('album.getimages')
            ->where('album', '[0-9]+');

        Route::get('photos', function () {
            return Photo::all();
        });


        Route::get('usersnoalbums', function () {
            $usersnoalbum = DB::table('users  as u')
                ->leftJoin('albums as a', 'u.id', 'a.user_id')
                ->select('u.id', 'email', 'name', 'album_name')->
                whereRaw('album_name is null')
                ->get();
            $usersnoalbum = DB::table('users  as u')
                ->select('u.id', 'email', 'name')->
                whereRaw('NOT EXISTS (SELECT user_id from albums where user_id= u.id)')
                ->get();
            return $usersnoalbum;
        });

        Route::resource('photos', PhotosController::class);
        Route::resource('categories', 'AlbumCategoryController');
    }
);

// Gallery routes

Route::group(
    [

        'prefix' => 'gallery'
    ]
    ,
    function () {
        Route::get('albums',[ GalleryController::class, 'index'])
            ->name('gallery.albums');

        Route::get('albums/category/{category}',
            'GalleryController@showAlbumsByCategory')
            ->name('gallery.album.category');

        Route::get('/{category_id?}',[ GalleryController::class, 'index'] )
            ->name('gallery.albums');

        Route::get('album/{album}/images', [ GalleryController::class, 'showAlbumImages'] )
            ->name('gallery.album.images');
    });
// images

Auth::routes(['verify' => true]);

Route::get('/', [GalleryController::class, 'index']);
Route::redirect('home', '/');
Route::get('testMail',function (){
    \Mail::to('hidran@gmail.com')->send(new \LaraCourse\Mail\TestMd(Auth::user()));
});
//Route::view('testMail','mails.testemail', ['username'=>'Hidran']);

Route::get('testEvent', function (){
    $album = Album::first();


    event(new \LaraCourse\Events\NewAlbumCreated($album));

});
