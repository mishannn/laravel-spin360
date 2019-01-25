<?php

namespace App\Helpers;

use App\Spin;
use Exception;
use Illuminate\Http\UploadedFile;
use Storage;
use ZipArchive;

class SpinHelper {
    /**
     * @param string $name
     * @throws Exception
     */
    public static function delete($name) {
        $publicStorage = Storage::disk('public');
        $spinsRelativePath = 'spins/' . $name;

        if ($publicStorage->exists($spinsRelativePath)) {
            $publicStorage->deleteDirectory($spinsRelativePath);
        }

        Spin::whereName($name)->first()->delete();
    }

    /**
     * @param array $data
     * @param UploadedFile $file
     * @return string
     * @throws Exception
     */
    public static function create($data, $file) {
        $uploadName = $data['upload_name'];

        $publicStorage = Storage::disk('public');
        $spinsRelativePath = 'spins/' . $uploadName;
        $spinsFullPath = $publicStorage->path($spinsRelativePath);

        if ($publicStorage->exists($spinsRelativePath)) {
            $publicStorage->deleteDirectory($spinsRelativePath);
        }

        $relativePath = $file->storeAs('uploads', $uploadName . '.zip');
        $fullPath = Storage::disk('local')->path($relativePath);

        $zip = new ZipArchive();
        if (($errno = $zip->open($fullPath)) !== true) {
            throw new Exception(__('Can\'t open the ZIP archive'));
        }

        $zip->extractTo($spinsFullPath);
        $zip->close();
        Storage::delete($relativePath);

        $filesCount = 0;
        foreach ($publicStorage->files($spinsRelativePath) as $fileRelativePath) {
            $publicStorage->move($fileRelativePath, $spinsRelativePath . '/' . ($filesCount + 1) . '.jpg');
            $filesCount++;
        }

        $spin = Spin::whereName($uploadName)->first();
        if (!isset($spin)) {
            $spin = new Spin();
            $spin->name = $uploadName;
        }

        $spin->title = $data['upload_title'];
        $spin->invert_rotation = isset($data['upload_invert_rotation']) ? 1 : 0;
        $spin->frames_count = $filesCount;
        $spin->rotation_speed = $data['upload_rotation_speed'];
        $spin->save();

        return $uploadName;
    }
}