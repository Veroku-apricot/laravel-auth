<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

      $this -> deleteIcon();

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

    public function clearIcon() {

      $this -> deleteIcon();

      $user = Auth::user();
      $user -> icon = null;
      $user -> save();

      return redirect() -> back();
    }

    private function deleteIcon() {

      $user = Auth::user();

      try {

        $fileName = $user -> icon;
        $file = storage_path('app/public/icon/' . $fileName);
        File::delete($file);
      } catch(\Exception $e) {}
    }
}
