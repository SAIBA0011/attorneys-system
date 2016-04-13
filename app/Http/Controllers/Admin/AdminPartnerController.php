<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPartnerRequest;
use App\Http\Requests;
use App\Models\Partner;
use App\Repositories\Partner\PartnerRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class AdminPartnerController extends Controller
{
    protected $repository;

    /**
     * AdminPartnerController constructor.
     * @param PartnerRepositoryInterface $repository
     */
    public function __construct(PartnerRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('isAdmin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Return all the Partners
     */
    public function index()
    {
        $partners = $this->repository->getAll();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Return the create page for partners
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * @param AdminPartnerRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Store a new partner
     */
    public function store(AdminPartnerRequest $request)
    {
        $this->repository->createFolder();
        $partner = $request->except(['_token', 'thumbnail']);
        $partner = $this->repository->getFile($partner);
        Partner::create($partner);
        return redirect('admin/partners/show');
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * returns the edit page for partner
     */
    public function edit($slug)
    {
        $partner = $this->repository->find($slug);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(AdminPartnerRequest $request, $slug)
    {
        $partner = $this->repository->find($slug);
        $input = Input::except('_token', 'thumbnail');
        $this->repository->updateFile($partner);
        $partner->update($input);
        return redirect()->back();
    }

    public function destroy($slug)
    {
        $partner = $this->repository->find($slug);
        File::delete(public_path(). $partner->thumbnail);
        $partner->delete();
        return redirect()->back();
    }
}
