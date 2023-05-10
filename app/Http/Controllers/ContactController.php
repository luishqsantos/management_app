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
    public function index()
    {
        //->orderBy('id', 'desc')
        $contacts = SiteContact::with('reason')->paginate(10);
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
        //
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
