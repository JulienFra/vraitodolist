<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index()
    {
        return view('tasks.index');
    }

    public function changeLanguage($locale)
    {
        // Vérifiez si la langue est valide
        if (!in_array($locale, ['en', 'fr'])) {
            abort(400);
        }

        // Changez la langue pour la session en cours


        session(['lang' => $locale]);



        $previousUrl = URL::previous() ?: route('tasks.index');

        // Redirigez vers la page précédente
        return redirect($previousUrl);
    }
}
