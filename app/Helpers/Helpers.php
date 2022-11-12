<?php

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @throws Exception
 */
function uploadFile(File|UploadedFile $file, $folderPath = '', $disk='public') :string
{
    $availableDisks = config('filesystems.disks');

    if(!isset($availableDisks[$disk])){
        throw new Exception('Invalid disk name');
    }

    $filePath = Storage::disk($disk)->put($folderPath, $file);

    if(!$filePath){
        throw new Exception('Image was not uploaded successfully');
    }

    if($disk == 'public'){
        $filePath = 'storage/'. $filePath;
    }

    return $filePath;

}
