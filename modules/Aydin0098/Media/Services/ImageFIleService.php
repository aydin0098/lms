<?php

namespace Aydin0098\Media\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageFIleService
{
    protected static $sizes = ['300','600'];
    public static function upload($file)
    {
        $fileName = uniqid();
        $extension = $file->getClientOriginalExtension();
        $dir = 'app\public\\';
        $file->move(storage_path($dir),$fileName.'.'.$extension);
        $path = $dir . '\\' . $fileName . '.' . $extension;
        return self::resize(storage_path($path),$dir,$fileName,$extension);

    }

    private static function resize($img,$dir,$fileName,$extension)
    {
        $img = Image::make($img);
        $imgs['original'] = $fileName.'.'.$extension;
        foreach (self::$sizes as $size){

            $imgs[$size] = $fileName.'_'.$size.'.'.$extension;

         $img->resize($size,null,function ($aspect){
             $aspect->aspectRatio();
         })->save(storage_path($dir).$fileName.'_'.$size.'.'.$extension);
        }

        return $imgs;

    }

    public static function delete($media)
    {
        foreach ($media->files as $file){
            Storage::delete('public\\'.$file);
        }
    }

}
