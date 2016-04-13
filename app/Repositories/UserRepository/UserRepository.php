<?php namespace App\Repositories\UserRepository;


use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class UserRepository implements UserRepositoryInterface
{
    public function findUser( $slug)
    {
        $user = User::whereSlug($slug)->first();
        return $user;
    }

    // Update the file that the user uploads.
    public function updateFile($user)
    {
        $folder = '/assets/admin/images/profiles/';
        if (Input::hasfile('thumbnail')) {
            File::delete(public_path() . $user->profile->thumbnail);
            $thumbnail = $this->inputFile($folder);
            $user->profile->update($thumbnail);
        };
    }

    // Get the file that was uplaoded by the user.
    public function getFile($user)
{
    $this->createFolder();
    $folder = '/assets/admin/images/profiles/';
    if (Input::hasfile('thumbnail')) {
        $thumbnail = $this->inputFile($folder);
        $user = array_merge($user, $thumbnail);
        return $user;
    }
    return $user;
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

    // Check if folder exists otherwise create a new one.
    public function createFolder()
    {
        $path = 'assets/admin/images/profiles';
        if (!file_exists($path)) File::makeDirectory($path, 0775, true, true);
    }
}