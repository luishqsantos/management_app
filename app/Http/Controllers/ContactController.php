<?php

namespace App\Http\Controllers;

use App\SiteContact;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $status = $request->query('status') ?? 1;
        $contacts = SiteContact::with('reason')->where('status', $status)->orderByDesc('id')->paginate(5);

        return view('app.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SiteContact  $siteContact
     * @return \Illuminate\Http\Response
     */
    public function show(SiteContact $siteContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SiteContact  $siteContact
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteContact $siteContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteContact  $siteContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteContact $siteContact)
    {
        dd($request->get('status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteContact  $siteContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteContact $siteContact)
    {
        //
    }
}
