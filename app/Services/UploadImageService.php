<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Classe com métodos internos que alteram
 * o comportamento do objeto e retorna a si mesmo
 */
class UploadImageService {

    public UploadedFile $image;

    public function setImage(UploadedFile $image) {
        $this->$image = $image;
        return $this; //retorna própria instância para permitir encadeamento de métodos
    }

    public function saveImage() {
        $path = 'images/' . Str::random();
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path, 0755, true);
        }
        if (!Storage::putFileAS('public/' . $path, $image, $image->getClientOriginalName())) {
            throw new \Exception("Unable to save file \"{$image->getClientOriginalName()}\"");
        }

        return $path . '/' . $image->getClientOriginalName();
    }

}