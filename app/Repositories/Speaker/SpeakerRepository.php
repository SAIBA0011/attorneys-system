<?php
namespace App\Repositories\Speaker;

use App\Models\Speaker;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class SpeakerRepository implements SpeakerRepositoryInterface
{

    public function getAll()
    {
        return Speaker::all();
    }

    public function find($slug)
    {
        return Speaker::whereSlug($slug)->first();
    }

    public function updateFile($speaker)
    {
        $folder = '/assets/admin/images/speakers/';
        if (Input::hasfile('thumbnail')) {
            File::delete(public_path() . $speaker->thumbnail);
            $thumbnail = $this->inputFile($folder);
            $speaker->update($thumbnail);
        };
    }

    public function getFile($speaker)
    {
        $this->createFolder();
        $folder = '/assets/admin/images/speakers/';
        if (Input::hasfile('thumbnail')) {
            $thumbnail = $this->inputFile($folder);
            $speaker = array_merge($speaker, $thumbnail);
            return $speaker;
        }
        return $speaker;
    }

    public function inputFile($folder)
    {
        $thumbnail = Input::file('thumbnail');
        $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
        $path = public_path($folder . $filename);
        Image::make($thumbnail->getRealPath())->resize('360', '360')->fill()->save($path);
        $thumbnail = ['thumbnail' => $folder . $filename];
        return $thumbnail;
    }

    public function createFolder()
    {
        $path = 'assets/admin/images/speakers';
        if (!file_exists($path)) File::makeDirectory($path, 0775, true, true);
    }

}