<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class DocumentService
{

    public static function save_file(Request $request, $column_name = 'file', $folder = '', $grayscale = false, $name = '', $ext = '')
    {
        if ($request->hasFile($column_name)) {
            $file = $request->file($column_name);
            if ($folder === '') $folder = $column_name;
            if ($name === '') $name = Str::uuid();
            if ($ext === '') $filename = $name . '.' . $file->extension();
            else $filename = $name . '.' . $ext;
            if ($grayscale === true) {
                $path = $folder . '/';
                $gray_image = storage_path('app\\' . $path.$filename);
                Image::read($file)->greyscale()->scaleDown(width: 400)->save($gray_image);
                return $path . $filename;
            } else {
                return Storage::putFileAs($folder, $file, $filename);
            }
        }
        return '';
    }

    public static function delete_file($filename)
    {
        try {
            Storage::delete($filename);
        } catch (\Exception $e) {
        }
    }
}
