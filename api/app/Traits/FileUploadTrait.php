<?php

namespace App\Traits;

use Storage;

trait FileUploadTrait
{
    protected function upload($file, $directory = "public/user-images", $disk = "local")
    {
        $path = $file->store($directory, $disk);

        return $this->getFilename($path);
    }

    protected function delete($file, $directory = 'public', $disk = "local")
    {
        return Storage::disk($disk)->delete($file);
    }

    public function getFilename($path)
    {
        return basename($path);
    }
}