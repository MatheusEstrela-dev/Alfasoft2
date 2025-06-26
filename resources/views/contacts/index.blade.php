{{-- resources/views/contacts/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="space-y-6 pb-24">
  {{-- Cabeçalho da lista --}}
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Contatos ({{ $contacts->total() }})</h1>
    <a href="{{ route('contacts.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      + Novo Contato
    </a>
  </div>

  {{-- Grid de cards --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-16">
    @forelse($contacts as $contact)
      <div class="bg-white p-4 rounded-lg shadow hover:shadow-md transition flex items-center justify-between">
        {{-- Link para detalhes --}}
        <a href="{{ route('contacts.show', $contact) }}" class="flex items-center space-x-4 flex-1">
          {{-- Avatar --}}
          <div class="h-10 w-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-semibold">
            {{ strtoupper(substr($contact->name, 0, 1)) }}
          </div>
          {{-- Info --}}
          <div>
            <div class="font-medium text-gray-900">{{ $contact->name }}</div>
            <div class="text-sm text-gray-500">{{ $contact->email }}</div>
          </div>
        </a>

        {{-- Botões de ação --}}
        <div class="flex items-center space-x-2 ml-4">
          {{-- ✏️ abre página de edição --}}
          <a href="{{ route('contacts.edit', $contact) }}"
             class="text-yellow-500 hover:text-yellow-600"
             title="Editar">
            ✏️
          </a>

          {{-- ❌ deleta --}}
          <form action="{{ route('contacts.destroy', $contact) }}"
                method="POST"
                onsubmit="return confirm('Deseja realmente excluir este contato?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="text-red-500 hover:text-red-600"
                    title="Excluir">
              ❌
            </button>
          </form>
        </div>
      </div>
    @empty
      <p class="text-gray-500 col-span-full">Nenhum contato encontrado.</p>
    @endforelse
  </div>

  {{-- Paginação --}}
  <div class="mt-20 flex justify-center">
    {{ $contacts->withQueryString()->links() }}
  </div>
</div>
@endsection
