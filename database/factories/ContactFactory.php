<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Exibe a lista de contatos na página “home”
     */
    public function index(): View
    {
        // Busca os contatos paginados
        $contacts = Contact::latest()->paginate(10);

        // Retorna a view correta, passando o array ['contacts' => $contacts]
        return view('contacts.home', compact('contacts'));
    }
}
