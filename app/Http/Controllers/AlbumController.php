<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index() {
        $albums = Album::where('userID', Auth::id())->get();
        return view('albums.index', compact('albums'));
    }
        public function create(){
    return view('albums.create');
    //
   }
   
   public function store(Request $request){
    $request->validate([
        'namaAlbum' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:150',
    ]);
    Album::create([
        'namaAlbum' => $request->namaAlbum,
        'deskripsi' => $request->deskripsi,
        'userID' => Auth::id(),
        'tanggalDibuat' => now(),
    ]);

    //Redirect ke halaman index album
    return redirect()->route('albums.index');
   }

   public function edit(Album $album){
    if($album->userID !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }
    //tampilkan halaman edit dengan data album
    return view('albums.edit', compact('album'));
   }

   public function update(Request $request, Album $album){
    if ($album->userID !== Auth::id()){
        abort(403, 'Unauthorized action.');
    }

    //update album dengan data baru
    $album->update([
        'namaAlbum' => $request->namaAlbum,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('albums.index');
   }

   public function destroy(Album $album){
    if ($album->userID !== Auth::id()){
        abort(403, 'Unauthorized action.');
    }
    //hapus album
    $album->delete();
    return redirect()->route('albums.index');
   }
}
