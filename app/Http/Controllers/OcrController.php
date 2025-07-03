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
        $file = Storage::path($filename); 
        $ocrText = (new TesseractOCR($file))->run(2000);
        DocumentService::delete_file($filename);

        return response()->json(['ocrText' => $ocrText]);
    }
}
