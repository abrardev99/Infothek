<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class FilePondController extends Controller
{
  public function upload($name, Request $request)
  {
    $input = $request->file($name);
    $file = is_array($input) ? $input[0] : $input;
    $path = $file->storeAs('filepond/tmp/', $file->getClientOriginalName());
    return $path;
  }

  public function delete(Request $request)
  {
    Storage::delete($request->getContent());
    return [];
  }





}
