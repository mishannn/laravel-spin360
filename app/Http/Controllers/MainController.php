<?php

namespace App\Http\Controllers;

use App\Spin;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function __construct()
    {
        //
    }

    public function home() {
        return redirect()->route('admin.index');
    }

    public function spin($name) {
        $spin = Spin::whereName($name)->first();
        if (!isset($spin)) {
            return abort(404);
        }

        $path = 'spins/' . $name;
        $storage = Storage::disk('public');
        if (!$storage->exists($path)) {
            return abort(404);
        }

//        $frames = $storage->allFiles($path);

        return view('spin', [
            'spin' => $spin,
        ]);
    }
}
