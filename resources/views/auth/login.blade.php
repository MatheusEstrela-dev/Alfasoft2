<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Matheus Estrela</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

    <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm bg-white p-6 rounded shadow">
        @csrf
        <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">WeCalled</h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-medium mb-2">Senha</label>
            <input id="password" type="password" name="password" required
                   class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded transition-colors">
            Entrar
        </button>
    </form>

    <footer class="mt-8 text-center text-gray-500 text-sm">
        Desenvolvido por <strong>Matheus Estrela</strong> · 💻 TI & Inovação · 📍 Belo Horizonte – MG<br>
        🔗 <a href="https://www.linkedin.com/in/matheus-estrela-32072a104/" target="_blank" class="text-blue-600 hover:underline">
            LinkedIn
        </a>
        ·
        🔗 <a href="https://github.com/MatheusEstrela-dev" target="_blank" class="text-gray-800 hover:underline">
            GitHub
        </a>
    </footer>

</body>
</html>
