<?php

namespace App\Repositories\Sponsor;


use App\Models\Category;
use App\Models\Sponsor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class SponsorRepository implements SponsorRepositoryInterface
{
    public function PluckCategories()
    {
        return Category::pluck('title', 'id');
    }

    public function findSponsor($id)
    {
        return Sponsor::findorFail($id);
    }

    public function getFile($sponsor)
    {
        $folder = '/assets/admin/images/sponsors/';
        if (Input::hasfile('thumbnail')) {
            $thumbnail = $this->inputFile($folder);
            $sponsor = array_merge($sponsor, $thumbnail);
            return $sponsor;
        }
        return $sponsor;
    }

    public function updateFile($sponsor)
    {
        $folder = '/assets/admin/images/sponsors/';
        if (Input::hasfile('thumbnail')) {
            File::delete(public_path().$sponsor->thumbnail);
            $thumbnail = $this->inputFile($folder);
            $sponsor->update($thumbnail);
        };
    }

    public function inputFile($folder)
    {
        $thumbnail = Input::file('thumbnail');
        $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
        $path = public_path($folder . $filename);
        Image::make($thumbnail->getRealPath())->fill()->save($path);
        $thumbnail = ['thumbnail' => $folder . $filename];
        return $thumbnail;
    }

    public function createFolder()
    {
        $path = 'assets/admin/images/sponsors';
        if (!file_exists($path)) File::makeDirectory($path, 0775, true, true);
    }
}