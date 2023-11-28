<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if($request->role === 'association'){
            $request->validate([
                'nom' => ['required', 'string', 'max:30'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'slogan' => ['required', 'string', 'max:50'],
                'logo' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:50'],
                


            ]);
        }elseif($request->role === 'client'){
            $request->validate([
                'nom' => ['required', 'string', 'max:30'],
                'prenom' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'telephone' => ['required', 'string', 'max:50'],
                'role' => ['required', 'string', 'max:50'],

            ]);
        }else{
            $request->validate([
                'nom' => ['required', 'string', 'max:30'],
                'prenom' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'telephone' => ['required', 'string', 'max:50'],
                'slogan' => ['required', 'string', 'max:50'],
                'logo' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:50'],

            ]);
        }
            $user = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'telephone' => $request->telephone,
                'slogan' => $request->slogan,
                'logo' => '',
            ]);
            if ($request->file('logo')) {
                $file = $request->file('logo');
                $logoContent = file_get_contents($file->getRealPath());
                $user->update(['logo' => $logoContent]);
            }
            
            event(new Registered($user));

            Auth::login($user);

            if ($request->role === 'association') {
                return redirect()->route('association.index');
            } elseif($request->role === 'client') {
                return redirect()->route('client.index');
            }
        }
        
}
