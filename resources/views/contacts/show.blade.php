{{-- resources/views/contacts/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 space-y-6">
  {{-- Cabeçalho --}}
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Detalhes do Contato</h1>
    <a href="{{ route('contacts.index') }}"
       class="text-gray-600 hover:text-gray-800">
      ← Voltar
    </a>
  </div>

  {{-- Cartão de detalhe --}}
  <div class="bg-white shadow rounded-lg p-6 space-y-6">
    <div class="flex items-center space-x-6">
      {{-- Avatar grande --}}
      <div class="h-16 w-16 rounded-full bg-blue-500 text-white flex items-center justify-center text-2xl font-semibold">
        {{ strtoupper(substr($contact->name, 0, 1)) }}
      </div>
      <div>
        <h2 class="text-xl font-medium">{{ $contact->name }}</h2>
        <p class="text-sm text-gray-500">{{ $contact->email }}</p>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <span class="font-medium text-gray-700">Telefone:</span>
        <p>{{ $contact->phone ?? '—' }}</p>
      </div>
      <div>
        <span class="font-medium text-gray-700">Skype:</span>
        <p>{{ $contact->skype ?? '—' }}</p>
      </div>
      <div>
        <span class="font-medium text-gray-700">Endereço:</span>
        <p>{{ $contact->address ?? '—' }}</p>
      </div>
      <div>
        <span class="font-medium text-gray-700">Cidade:</span>
        <p>{{ $contact->city ?? '—' }}</p>
      </div>
      <div>
        <span class="font-medium text-gray-700">Empresa:</span>
        <p>{{ $contact->company ?? '—' }}</p>
      </div>
      <div class="md:col-span-2">
        <span class="font-medium text-gray-700">Observações:</span>
        <p class="whitespace-pre-wrap">{{ $contact->notes ?? '—' }}</p>
      </div>
    </div>
  </div>

  {{-- Ações --}}
  <div class="flex space-x-2">
    <a href="{{ route('contacts.edit', $contact) }}"
       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
      ✏️ Editar
    </a>

    <form action="{{ route('contacts.destroy', $contact) }}"
          method="POST"
          onsubmit="return confirm('Tem certeza que deseja excluir este contato?')">
      @csrf
      @method('DELETE')
      <button type="submit"
              class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
        ❌ Excluir
      </button>
    </form>
  </div>
</div>
@endsection
