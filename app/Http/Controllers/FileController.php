<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    
    
    public function list()
    {
        $files = Storage::disk('ftp')->allFiles('/categories');
        $matches  = preg_grep ('/^categories\/kategoriler\-(\d+).xlsx/i', $files);

        rsort($matches);

        $file = Storage::disk('ftp')->get($matches[0]);
        Storage::disk('local')->put("deneme.xlsx", $file);

        var_dump($file);
    }



}
  
