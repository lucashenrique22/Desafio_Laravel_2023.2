<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserFormRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function index(Request $request): View
    {
        $users = User::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('users.index')->with('users',$users)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserFormRequest $request)
    {
 //        dd($request->all());

        $address = Address::create($request->all());

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' =>Hash::make($request->password),
                'birth_date' => $request->birth_date,
                'phone_number' => $request->phone_number,
                'work_time' => $request->work_time,
                'address_id' => $address->id,
            ]
        );

        return to_route('users.index')->with('mensagem.sucesso', "Usuário '{$user->name}' criado com sucesso");
    }

    public function show(User $user): View
    {
        $user->load('address');
        return view('users.show', compact('user'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return to_route('users.index')->with('mensagem.sucesso', "Usuário '{$user->name}' deletado com sucesso");
    }
}
