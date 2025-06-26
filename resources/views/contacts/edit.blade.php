{{-- resources/views/contacts/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-8 bg-white p-6 rounded-lg shadow">
  <h1 class="text-2xl font-semibold mb-6">Editar Contato</h1>

  {{-- Mensagem de sucesso --}}
  @if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
      {{ session('success') }}
    </div>
  @endif

  {{-- Erros de validação --}}
  @if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('contacts.update', $contact) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
      <label for="name" class="block font-medium">Nome</label>
      <input
        id="name"
        name="name"
        type="text"
        value="{{ old('name', $contact->name) }}"
        class="w-full mt-1 px-3 py-2 border rounded focus:outline-none focus:ring"
        required
      >
    </div>

    <div>
      <label for="email" class="block font-medium">E-mail</label>
      <input
        id="email"
        name="email"
        type="email"
        value="{{ old('email', $contact->email) }}"
        class="w-full mt-1 px-3 py-2 border rounded focus:outline-none focus:ring"
        required
      >
    </div>

    <div>
      <label for="phone" class="block font-medium">Telefone</label>
      <input
        id="phone"
        name="phone"
        type="text"
        value="{{ old('phone', $contact->phone) }}"
        class="w-full mt-1 px-3 py-2 border rounded focus:outline-none focus:ring"
        placeholder="(31) 99999-9999"
      >
    </div>

    <div class="flex justify-end space-x-2">
      <a href="{{ route('contacts.index') }}"
         class="px-4 py-2 border rounded hover:bg-gray-100">
        Cancelar
      </a>
      <button type="submit"
              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Atualizar
      </button>
    </div>
  </form>
</div>
@endsection
