<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

      $user = Auth::user();
      $user -> icon = $destFile;
      $user -> save();

      // dd($image, $destFile);

      return redirect() -> back();
    }

    public function deleteIcon() {

      $user = Auth::user();
      $user -> icon = null;
      $user -> save();

      return redirect() -> back();
    }
}
