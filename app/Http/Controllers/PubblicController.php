<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Exception;

class PubblicController extends Controller
{
    public $users = [
        ['name' => 'Mario', 'surname' => 'Rossi', 'role' => 'Senior Manager'],
        ['name' => 'Luigi', 'surname' => 'Bianchi', 'role' => 'Junior Manager'],
        ['name' => 'Giovanni', 'surname' => 'Verdi', 'role' => 'Developer']
    ];


    public function homepage()
    {
        return view('welcome');
    }

    public function aboutUs()
    {
        return view('about-us', ['users' => $this->users]);
    }

    public function aboutUsDetail($nome)
    {
        foreach ($this->users as $user) {
            if ($nome == $user['name']) {
                return view('about-us-detail', ['user' => $user]);
            }
        }
    }

    public function contactUs(Request $request)
    {

        $user = $request->input('user');
        $email = $request->input('email');
        $message = $request->input('message');
        $userData = compact('user', 'email', 'message');

        try {
            Mail::to($email)->send(new ContactMail($userData));
        } catch (Exception $e) {
            return redirect()->route('homepage')->with('emailError', "C'è stato un errore nell'invio della mail, riprova più tardi!");
        }

        return redirect(route('homepage'))->with('emailSent', 'Hai inviato correttamente la tua mail, ti risponderemo al più presto!');
    }

    public function profile()
    {
        return view('profile');
    }

}
