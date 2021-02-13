<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function updateIcon(Request $request) {

      $request -> validate([
        'icon' => 'required|file'
      ]);
      $image = $request -> file('icon');

      $ext = $image -> getClientOriginalExtension();
      $name = rand(100000, 999999) . '_' . time();
      $destFile = $name . '.' . $ext;

      $file = $image -> storeAs('icon', $destFile, 'public');

      dd($image, $destFile);

    }
}
