<?php

namespace App\Repositories\Partner;
use App\Models\Partner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class PartnerRepository implements PartnerRepositoryInterface
{
    public function getAll()
    {
      return Partner::all();
    }

    public function find($slug)
    {
        return Partner::whereSlug($slug)->first();
    }

    public function createFolder()
    {
        $path = 'assets/admin/images/partners';
        if (!file_exists($path)) File::makeDirectory($path, 0775, true, true);
    }

    public function getFile($sponsor)
    {
        $folder = '/assets/admin/images/partners/';
        if (Input::hasfile('thumbnail')) {
            $thumbnail = $this->inputFile($folder);
            $sponsor = array_merge($sponsor, $thumbnail);
            return $sponsor;
        }
        return $sponsor;
    }

    public function updateFile($sponsor)
    {
        $folder = '/assets/admin/images/partners/';
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
        Image::make($thumbnail->getRealPath())->fill('400', '200')->save($path);
        $thumbnail = ['thumbnail' => $folder . $filename];
        return $thumbnail;
    }
}