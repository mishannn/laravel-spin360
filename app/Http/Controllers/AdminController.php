<?php

namespace App\Http\Controllers;

use App\Spin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Helpers\SpinHelper;
use Validator;

class AdminController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return mixed
     */
    public function index() {
        $spins = Spin::all();

        return view('admin.index', [
            'spins' => $spins,
        ]);
    }

    /**
     * @return mixed
     */
    public function uploadForm() {
        return view('admin.upload');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function uploadAction(Request $request) {
        $validator = Validator::make($request->all(), [
            'upload_title' => 'required|min:3|max:255',
            'upload_name' => 'required|regex:/[a-zA-Z0-9]{3,5}/',
            'upload_rotation_speed' => 'required|numeric',
            'upload_archive' => 'required|file',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.upload')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $uploadName = SpinHelper::create($request->all(), $request->file('upload_archive'));
            return redirect()->route('spin', ['name' => $uploadName]);
        } catch (Exception $exception) {
            $errors = new MessageBag();
            $errors->add('upload_error', $exception->getMessage());
            return redirect()->route('admin.upload')->withErrors($errors);
        }
    }

    /**
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function deleteSpin($name) {
        $redirect = redirect()->route('admin.index');

        try {
            SpinHelper::delete($name);
        } catch (Exception $exception) {
            $errors = new MessageBag();
            $errors->add('delete_error', $exception->getMessage());
            $redirect = $redirect->withErrors($errors);
        }

        return $redirect;
    }
}
