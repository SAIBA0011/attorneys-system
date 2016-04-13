<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminSponsorRequest;
use App\Models\Sponsor;
use App\Models\SponsorPageContent;
use App\Repositories\Sponsor\SponsorRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class AdminSponsorController extends Controller
{

    protected $repository;

    /**
     * AdminSponsorController constructor.
     * @param SponsorRepositoryInterface $repository
     */
    public function __construct( SponsorRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('isAdmin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Returns all the sponsors.
     */
    public function index()
    {
        $sponsors = Sponsor::paginate(10);
        return view('admin.sponsors.index', compact('sponsors'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Create a new sponsor.
     */
    public function create()
    {
        $categories = $this->repository->PluckCategories();
        return view('admin.sponsors.create', compact('categories'));
    }

    /**
     * @param AdminSponsorRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * This wills tore the new sponsor and create the folder for images if not exists.
     */
    public function store( AdminSponsorRequest $request)
    {
        $this->repository->createFolder();
        $sponsor = $request->except(['_token', 'thumbnail']);
        $sponsor = $this->repository->getFile($sponsor);

        Sponsor::create($sponsor);
        return redirect('admin/sponsors/view');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Edit existing sponsor.
     */
    public function edit( Request $request, $id)
    {
        $categories = $this->repository->PluckCategories();
        $sponsor = $this->repository->findSponsor($id);

        return view('admin.sponsors.edit', compact('sponsor', 'categories'));
    }

    /**
     * @param AdminSponsorRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Update an Exisiting sponsor.
     */
    public function update( AdminSponsorRequest $request, $id)
    {
        $sponsor = $this->repository->findSponsor($id);
        $input = Input::only('title','description','category_id');
        $this->repository->updateFile($sponsor);

        $sponsor->update($input);
         return redirect('admin/sponsors/view');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * Delete a sponsor.
     */
    public function destroy( Request $request, $id)
    {
        $sponsor = $this->repository->findSponsor($id);
        File::delete(public_path(). $sponsor->thumbnail);

        $sponsor->delete();
        return redirect()->back();
    }

    public function get_page_content()
    {
        return view('admin.sponsors.content.index');
    }

    public function store_page_content(Request $request)
    {
        SponsorPageContent::truncate();
        SponsorPageContent::create($request->only('title', 'content'));
        return redirect('/admin/sponsor/page_content/edit');
    }

    public function edit_page_content()
    {
        $page = SponsorPageContent::first();
        return view('admin.sponsors.content.edit', compact('page'));
    }

    public function update_page_content($id)
    {
        SponsorPageContent::findorfail($id);
    }
}
