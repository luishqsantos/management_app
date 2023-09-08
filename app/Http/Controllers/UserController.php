<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\UserService;
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
     * @return
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('user.edit', $user->id)->with('message', 'Usuário atualizado com sucesso!')->with('color', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
