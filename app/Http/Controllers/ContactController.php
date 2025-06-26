<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 1) Listagem paginada
    public function index(Request $request): View
    {
        $q = $request->get('q');

        $contacts = Contact::when($q, function ($query, $q) {
            $query->where(function ($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        })
            ->orderBy('name') // ordem alfabética ascendente
            ->paginate(22)
            ->withQueryString();

        return view('contacts.index', compact('contacts'));
    }

    // 2) Formulário de criação
    public function create(): View
    {
        return view('contacts.create');
    }

    // 3) Grava novo
    public function store(StoreContactRequest $request): RedirectResponse
    {
        Contact::create($request->validated());
        return redirect()->route('contacts.index')
            ->with('success', 'Contato criado com sucesso.');
    }

    // 4) Detalhes
    public function show(Contact $contact): View
    {
        return view('contacts.show', compact('contact'));
    }

    // 5) Formulário de edição
    public function edit(Contact $contact): View
    {
        return view('contacts.edit', compact('contact'));
    }

    // 6) Atualiza existente
    public function update(UpdateContactRequest $request, Contact $contact): RedirectResponse
    {
        $contact->update($request->validated());

        return redirect()->route('contacts.index')
            ->with('success', 'Contato atualizado.');
    }

    // 7) Remove (soft delete)
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'Contato removido com sucesso.');
    }
}
