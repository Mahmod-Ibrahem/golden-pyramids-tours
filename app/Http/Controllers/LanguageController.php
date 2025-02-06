<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLocale($locale)
    {

        $availableLocales = ['en', 'de'];

        if (!in_array($locale, $availableLocales)) {
            abort(404);
        }
        session()->put('locale', $locale);
        app()->setLocale($locale);
        return redirect()->back();
    }
}
