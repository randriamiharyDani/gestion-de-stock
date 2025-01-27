<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        $auth = new Register() ;
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }



    public function auth(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->password === sha1($request->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                // Connecter l'utilisateur
                session([
                    'id' => $user->id,
                    'username' => $user->username,
                ]);

                return redirect()->route('accueil')->with('success', 'Votre mot de passe a été mis à jour, et vous êtes connecté!');
            }

            if (Hash::check($request->password, $user->password)) {
                session([
                    'id' => $user->id,
                    'username' => $user->username,
                ]);

                return redirect()->route('accueil')->with('success', 'Vous êtes connecté!');
            }
        }
        // Si la connexion échoue
        return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
    }

    // public function traitementRegister(Request $request){
    //     // Validation
    //     $validator = $request->validate([
    //         'username' =>'required',
    //         'email' =>'required',
    //         'password' => 'required',
    //     ]);

    //     $user = new Register();

    //     $user->username = $request->username ;
    //     $user->email = $request->email ;
    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     if($user){
    //         return redirect()->route('accueil')->with('success', 'Votre compte a bien été créé!');
    //     }
    //     else{
    //         return redirect('register')->withErrors($validator, 'login');;
    //     }
    // }

    public function traitementRegister(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            return redirect()->route('accueil')->with('success', 'Votre compte a bien été créé!');
        } else {
            return redirect('register')->withErrors($validator, 'login');;
        }
    }



    public function deconnexion(Request $request)
    {
        // Déconnecter l'utilisateur
        Auth::logout();

        // Invalider la session et régénérer le token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Rediriger vers la page de connexion ou d'accueil
        return redirect()->to('/')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
