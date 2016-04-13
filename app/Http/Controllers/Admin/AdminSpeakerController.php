<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpeakerFormRequest;
use App\Models\Speaker;
use App\Repositories\Speaker\SpeakerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;

class AdminSpeakerController extends Controller
{
    protected $repository;

    /**
     * AdminSpeakerController constructor.
     * @param SpeakerRepositoryInterface $repository
     */
    public function __construct(SpeakerRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('isAdmin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Return all the speakers.
     */
    public function index()
    {
        $speakers = $this->repository->getAll();
        return view('admin.speakers.index', compact('speakers'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * return the create page for adding new speakers.
     */
    public function create()
    {
        return view('admin.speakers.create');
    }

    /**
     * @param Request $requests
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * return the edit page with the relevant Speaker slug.
     */
    public function edit(Request $requests, $slug)
    {
        $speaker = $this->repository->find($slug);
        return view('admin.speakers.edit', compact('speaker'));
    }

    /**
     * @param SpeakerFormRequest $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     * Update required speaker with text and image.
     */
    public function update(SpeakerFormRequest $request, $slug)
    {
        $speaker = $this->repository->find($slug);
        $input = Input::except('thumbnail', '_token');
        $this->repository->updateFile($speaker);
        $speaker->update($input);
        return redirect('admin/speakers/show');
    }

    /**
     * @param SpeakerFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Store a new speaker that was created.
     */
    public function store(SpeakerFormRequest $request)
    {
        $speaker = $request->except(['_token', 'thumbnail']);
        $speaker = $this->repository->getFile($speaker);
        Speaker::create($speaker);
        return redirect('admin/speakers/show');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * find the relevant speaker and destroy.
     */
    public function destroy(Request $request)
    {
        $speaker = $this->repository->find($request->slug);
        File::delete(public_path() . $speaker->thumbnail);
        $speaker->delete();
        return redirect('/admin/speakers/show');
    }
}
