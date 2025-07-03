<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
use App\Services\DocumentService;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class OcrController extends Controller
{
    public function index(Request $request)
    {  
        $filename = DocumentService::save_file($request, 'ocr_image', 'public/ocr', true);
        //D:\Sites\buku-tamu\storage\app\public/ocr/1db5ec68-48f9-406c-b221-100749347862.jpg
        // $filename = DocumentService::save_file($request, 'ocr_image', 'public/ocr');
        //D:\Sites\buku-tamu\storage\app\public/ocr/319c9a72-974b-49b0-8a3b-a7bdbb71783d.jpg
        $file = Storage::path($filename);
        $ocrText = (new TesseractOCR($file))->run(2000);
        DocumentService::delete_file($filename);

        dd($ocrText);
    }
}
