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
                'role' => ['required', 'string', 'max:50'],
            ]);
        }

        $user = new User();
        
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->telephone = $request->telephone;
        $user->slogan = $request->slogan;
        $user->role = $request->role;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $user['image']= $filename;
        }
        $user->save();
            
            event(new Registered($user));

            Auth::login($user);

            if ($request->role === 'association') {
                return redirect()->route('association.index', ['id' => $user->id]);
            } elseif($request->role === 'client') {
                return redirect()->route('client.index', ['id' => $user->id]);
            }
        }
        
}
