<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class HomeController extends Controller {
   //fungsi untuk menampilkan halaman home
   public function index(){
   //mengambil semua foto untuk ditampilkan di halaman home
   $photos = photo::all();
   return view('home', compact('photos'));
   }
}