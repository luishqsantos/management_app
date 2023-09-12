<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    protected $userService;

    /**
     * __construct
     *
     * @param  UserService $userService
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $users = $this->userService->search($search);

        return view('app.user.index', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return View
     */
    public function edit(User $user)
    {
        return view('auth.register', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('user.edit', $user->id)->with('message', 'Usuário atualizado com sucesso.')->with('color', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.index')->with('message', 'Usuário não encontrado.')->with('color', 'danger');
        }

        // Verifica se há um usuário autenticado
        // Verifique se o ID do usuário autenticado corresponde ao ID a ser excluído
        $AuthUser = Auth::user();
        if ($AuthUser->id == $id) {

            return redirect()->route('user.index')->with('message', 'Você não pode excluir sua própria conta enquanto estiver logado.')->with('color', 'danger');
        }

        $user->delete();

        return redirect()->route('user.index')->with('message', 'Usuário excluído com sucesso.')->with('color', 'success');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function getResetPasswordForm(User $user)
    {
        return view('auth.passwords.email', ['name' => $user->name, 'email' => $user->email]);
    }
}
