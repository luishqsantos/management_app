<?php

namespace App\Http\Controllers;

use App\Reason;
use App\SiteContact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;

class SiteContactController extends Controller
{
    public function index(Request $request)
    {
        return view('site.contact', [
            'reason' => Reason::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactStoreRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(ContactStoreRequest $request)
    {
        $redirectRouteName = $request->input('redirectRouteName');

        SiteContact::create($request->all());

        return redirect()->route($redirectRouteName)->with('message', 'Mensagem de contato enviada com sucesso!')->with('color', 'success');
    }
}
