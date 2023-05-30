<?php

namespace App\Http\Controllers;

use App\SiteContact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\ContactService;
use App\SiteContactReply;

class ContactController extends Controller
{

    protected $contactService;

    /**
     * __construct
     *
     * @param  ContactService $contactService
     * @return void
     */
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {

        $search = $request->query('search');
        $status = $request->query('status') ?? 1;

        $contacts = $this->contactService->search($search, $status);
        $quantityMessages = $this->contactService->getQuantityMessages();

        return view('app.contact.index', compact('contacts', 'quantityMessages'));
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
     * @param  \App\SiteContact  $contact
     * @param Request $request
     * @return View
     */
    public function show(Request $request, SiteContact $contact)
    {
        $quantityMessages = $this->contactService->getQuantityMessages();

        return view('app.contact.contact_show', compact('contact', 'quantityMessages'));
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

    public function reply(Request $request)
    {
        // Valida os dados do formulário conforme suas necessidades
        $validatedData = $request->validate([
            'site_contact_id' => 'required|exists:site_contacts,id',
            'message'         => 'required|string',
        ]);

        // Crie uma nova resposta
        $reply = new SiteContactReply();
        $reply->site_contact_id = $validatedData['site_contact_id'];
        $reply->message = $validatedData['message'];
        $reply->save();

        // Atualiza a mensagem como lida
        $message = SiteContact::findOrFail($validatedData['site_contact_id']);
        $message->status = 0;
        $message->save();

        return back()->with('message', 'Resposta Enviada com sucesso.')->with('color', 'success');
    }
}
