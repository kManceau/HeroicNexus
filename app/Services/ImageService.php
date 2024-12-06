<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    public function createImages($image):\GdImage
    {
        $image = imagecreatefromstring(file_get_contents($image));
        return $this->resizeImage($image);
    }

    public function resizeImage($image){
        $originalWidth = ImageSX($image);
        $originalHeight = ImageSY($image);
        $maxWidth = 400;
        if ($originalWidth > $maxWidth) {
            $ratio = $maxWidth / $originalWidth;
            $maxHeight = $originalHeight * $ratio;
        } else {
            $maxWidth = $originalWidth;
            $maxHeight = $originalHeight;
        }
        imagepalettetotruecolor($image);
        $resizedImage = imagecreatetruecolor($maxWidth, $maxHeight);
        imagealphablending($resizedImage, false);
        imagesavealpha($resizedImage, true);
        imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $maxWidth, $maxHeight, $originalWidth, $originalHeight);
        imagedestroy($image);
        return $resizedImage;
    }

    public function uploadImages($img, $id, $folder):void
    {
        $image = $this->createImages($img);

        $jpegPath = storage_path('app/public/'. $folder . '/' . $id . '.jpg');
        $webpPath = storage_path('app/public/'. $folder . '/' . $id . '.webp');
        $avifPath = storage_path('app/public/'. $folder . '/' . $id . '.avif');

        imagejpeg($image, $jpegPath, 100);
        imagewebp($image, $webpPath, 100);
        imageavif($image, $avifPath, 80);
        imagedestroy($image);
    }

    public function deleteImages($id, $folder):void
    {
        if(file_exists('app/public/'.$folder.'/'.$id.'.jpg')){
            unlink('app/public/'.$folder.'/'.$id.'.jpg');
        }
        if(file_exists('app/public/'.$folder.'/'.$id.'.webp')){
            unlink('app/public/'.$folder.'/'.$id.'.webp');
        }
    }
}
