<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use File;

class FileController extends Controller
{
    public function fileStorageServe($path, $file)
    {
        if(File::exists(storage_path('app') . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $file)) {
            return response()->file(storage_path('app') . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $file);
        } else {
            return response()->file(storage_path('app') . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'default.png');
        }
    }

    public function fileStorageContractPdf($path, $file)
    {
        if(File::exists(storage_path() . DIRECTORY_SEPARATOR . 'pdfs' . DIRECTORY_SEPARATOR . 'contracts' . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $file)) {
            return response()->file(storage_path() . DIRECTORY_SEPARATOR . 'pdfs' . DIRECTORY_SEPARATOR . 'contracts' . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $file);
        } else {
            return response()->file(storage_path('app') . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'default.png');
        }
    }
}
