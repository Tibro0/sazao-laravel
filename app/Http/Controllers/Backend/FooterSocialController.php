<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterSocial;
use Illuminate\Http\Request;

class FooterSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerSocials = FooterSocial::orderBy('id', 'DESC')->get();
        return view('admin.footer.footer-socials.index', compact('footerSocials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-socials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'url' => ['required', 'url', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);

        $footer = new FooterSocial();
        $footer->icon = $request->icon;
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();

        return redirect()->route('admin.footer-socials.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Created Successfully!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $footer = FooterSocial::findOrFail($id);
        return view('admin.footer.footer-socials.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'url' => ['required', 'url', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);

        $footer = FooterSocial::findOrFail($id);
        $footer->icon = $request->icon;
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();

        return redirect()->route('admin.footer-socials.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $footer = FooterSocial::findOrFail($id);
        $footer->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $footer = FooterSocial::findOrFail($request->id);
        $footer->status = $request->status == 'true' ? 1 : 0;
        $footer->save();
        return response(['status' => 'success', 'message' => 'Status Has Been Updated!']);
    }
}
