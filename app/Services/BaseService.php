<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseService
{
    const PAGINATE = 20;
    const PAGINATE_DEFAULT = 1;

    /**
     * Upload files to storage
     *
     * @param $files
     * @return array ["name" => ..., "path" => ...]
     */
    public function uploadFile($files, $newFolder=null): array
    {
        try {
            $imagePath = $files;
            $imageName = $imagePath->getClientOriginalName();
            $filename = explode('.', $imageName)[0];
            $extension = $imagePath->getClientOriginalExtension();
                $picName =  Str::slug(time()."_".$filename, "_").".". $extension;
                $folder = $newFolder ? 'uploads/'.$newFolder : 'uploads';
                $path = $files->storeAs($folder, $picName, 'public');
            return [
                "name" => $filename.".". $extension,
                "path" => $path
            ];
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    /**
     * Delete files to storage
     *
     * @param path files
     * @return bool
     */
    public function deleteFile($path): bool
    {
        try {
            if (Storage::exists('public/'.$path)) {
                Storage::delete('public/'.$path);
                return true;
            }
            return false;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
