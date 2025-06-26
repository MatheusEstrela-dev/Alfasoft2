<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','WeCalled')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Forçar sidebar fixa e navbar fixa */
    .sidebar { width: 260px; }
    .main { margin-left: 260px; }
  </style>
</head>
<body class="h-screen flex overflow-hidden bg-gray-100">

  {{-- Navbar --}}
  <header class="fixed top-0 left-0 right-0 h-14 bg-blue-600 text-white flex items-center px-4 shadow-md z-10">
    <button class="mr-4 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
    <span class="font-semibold text-lg">WeCalled</span>

    {{-- Busca --}}
    <div class="flex-1 flex justify-center px-4">
  <form method="GET" action="{{ route('contacts.index') }}" class="w-full max-w-lg">
    <div class="relative">
      <input
        name="q"
        value="{{ request('q') }}"
        placeholder="Pesquisar"
        class="w-full h-10 pl-12 pr-4 rounded bg-blue-500 bg-opacity-25 text-white placeholder-white focus:outline-none focus:bg-opacity-50"
      />
      <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-white">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35M17 11a6 6 0 1 1-12 0 6 6 0 0 1 12 0z" />
        </svg>
      </div>
    </div>
  </form>
</div>

    @auth
    <form method="POST" action="{{ route('logout') }}" class="ml-4">
      @csrf
      <button class="px-3 py-1 bg-blue-700 hover:bg-blue-800 rounded">Sair</button>
    </form>
    @endauth
  </header>

  {{-- Sidebar --}}
  <aside class="sidebar fixed top-14 bottom-0 left-0 bg-white border-r overflow-auto pt-4">
    <nav class="space-y-1">
      <a href="{{ route('contacts.index') }}"
         class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100 {{ request()->routeIs('contacts.index') ? 'bg-gray-200' : '' }}">
        <svg class="w-5 h-5 mr-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
          <path d="M3 4a2 2 0 012-2h10a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V4z" />
        </svg>
        <span>Contatos</span>
      </a>
      <a href="#"
         class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7" />
        </svg>
        <span>Contatos frequentes</span>
      </a>
      <a href="#"
         class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <span>Cópias</span>
      </a>

      <div class="border-t my-2"></div>

      <a href="#"
         class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3M4 11h16M4 15h16M4 19h16" />
        </svg>
        <span>Marcadores</span>
      </a>
      <a href="#"
         class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100">
        <span class="w-5 h-5 mr-3 flex items-center justify-center text-xl">+</span>
        <span>Criar marcador</span>
      </a>
      <div class="border-t my-2"></div>

      {{-- Mais --}}
      <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5h18M3 10h18M3 15h18M3 20h18" />
        </svg>
        <span>Mais</span>
      </a>
    </nav>
  </aside>

  {{-- Main Content --}}
  <main class="main flex-1 overflow-auto pt-16 px-6 pb-6">
    @yield('content')
  </main>
</body>
</html>
