<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileFormRequest;
use App\Models\FollowUser;
use App\User;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
{
    protected $repository;

    /**
     * ProfileController constructor.
     * @param UserRepository|UserRepositoryInterface $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('profile')->only('show', 'edit', 'update');
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|View
     */
    public function index( $slug)
    {
        try{
            $user = $this->repository->findUser($slug);
        }
        catch(ModelNotFoundException $e)
        {
            $message = Flash::message('The requested user profile was not found, Please try again.');
            return redirect('/')->with('message', $message);
        }

        return view('frontend.profiles.index', compact('user'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|View
     */
    public function show( $slug)
    {
        try{
            $user =$this->repository->findUser($slug);
        }
        catch(ModelNotFoundException $e)
        {
            $message = Flash::message('The requested user profile was not found, Please try again.');
            return redirect('/')->with('message', $message);
        }

        return view('frontend.profiles.show', compact('user'));
    }

    public function edit($slug)
    {
        $user = $this->repository->findUser($slug);
        return view('frontend.profiles.edit', compact('user'));
    }

    public function update(ProfileFormRequest $request, $slug)
    {
        // find this user.
        $user = $this->repository->findUser($slug);

        // request all the updated information without the thumbnail.
        $input = Input::except('thumbnail');

        //Check Repo for method, This will grab the new uploaded file and replace the old if exist.
        $this->repository->updateFile($user);

        // Update the user profile with the input and the user.
        $user->profile->update($input);
        $user->update($input);

        Flash::message('Success! your profile has been updated');
        return redirect()->back();
    }

    public function friends($slug)
    {
        $user = $this->repository->findUser($slug);
        return view('frontend.profiles.friends.index', compact('user'));
    }

    public function friendsRequests($slug)
    {
        $user = $this->repository->findUser($slug);
        return view('frontend.profiles.friends.friend_requests', compact('user'));
    }

}
