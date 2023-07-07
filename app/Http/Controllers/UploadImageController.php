<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    function index(string $imgName) {
		try {
			return response()->file(storage_path("app/public/gambar/".$imgName));
		} catch (\Throwable $th) {
			dd($th);
			abort(404);
		}
	}
}
