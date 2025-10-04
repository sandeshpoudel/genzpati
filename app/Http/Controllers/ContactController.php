<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = "You can reach us at";

        return view('contact', compact('contact'));
    }
}
