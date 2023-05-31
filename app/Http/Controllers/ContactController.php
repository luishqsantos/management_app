<?php

namespace App\Http\Controllers;

use App\SiteContact;
use App\SiteContactReply;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\ContactService;
use App\Http\Requests\ContactReplyRequest;

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $contact = SiteContact::find($id);

        $status = $request->get('status');

        $contact->update([
            'status' => $status
        ]);

        $message = !$status ? 'lida' : 'não lida';

        return back()->with('message', "Mensagem marcada como ".$message)->with('color', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $contact = SiteContact::find($id);

        //Exclui a resposta da mensagem caso exista
        if ($contact->reply()->exists()) {
            $contact->reply->delete();
        }

        $contact->delete();

        return redirect()->route('contact.index')->with('message', 'Mensagem excluida com sucesso')->with('color', 'success');
    }

    /**
     * Reply the the specified message.
     *
     * @param  ContactReplyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reply(ContactReplyRequest $request)
    {
        // Crie uma nova resposta
        $reply = new SiteContactReply();
        $reply->site_contact_id = $request->site_contact_id;
        $reply->message         = $request->message;
        $reply->save();

        // Atualiza a mensagem como lida
        $message = SiteContact::findOrFail($request->site_contact_id);
        $message->status = 0;
        $message->save();

        return back()->with('message', 'Resposta enviada com sucesso.')->with('color', 'success');
    }
}
