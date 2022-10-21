<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $roles = User::getRoles();
        return view('personal.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if(isset($data['photo'])) {
            $data['photo'] = Storage::disk('public')->put('images', $data['photo']);
        }
        //dd($data);
        $user->update($data);
        //dd($user);
        return redirect()->route('personal.main.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('personal.main.index');
    }
}
