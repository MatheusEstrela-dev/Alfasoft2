# WeCalled – Gerenciador de Contatos

Um sistema de CRUD de contatos inspirado no design do Agenda de Contatos, desenvolvido em **Laravel 12** com Docker.

---

## 🛠 Tecnologias

- **Framework**: Laravel 12
- **Linguagem**: PHP 8.3
- **Containerização**: Docker & Docker Compose
- **Webserver**: Nginx (dentro do container)
- **Banco de Dados**: MariaDB 10.6
- **Front-end**: Blade + Tailwind CSS
- **Seeders & Factories**: Faker para geração de 100 contatos fake
- **Design de Referência:** [Google Contacts UI Pattern](https://drive.google.com/file/d/1Y9myH06uybW56sP7aoQi0WyWNA0DAl-H/view?usp=drive_link)

---![Engine.bat](https://github.com/user-attachments/assets/134a997b-2ce0-4195-8d61-3bb8b90ae284)


## 🚀 Pré-requisitos

- Docker & Docker Compose instalados
- Git e Github
- (Opcional) Composer & Node.js local, para desenvolvimento sem containers

---

## 📁 Estrutura de Pastas

```
.
├── app/                  # Lógica de negócio (Models, Controllers)
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/               # Document root (index.php, assets)
├── resources/
│   ├── views/            # Templates Blade
│   └── css/, js/         # Assets estáticos
├── routes/
│   └── web.php           # Definição de rotas
├── storage/
├── tests/
├── docker-compose.yml
├── Dockerfile
├── .env                  # Variáveis de ambiente
└── README.md
```

---

## 🐳 Rodando com Docker

1. **Clone o repositório**

```bash
git clone https://github.com/MatheusEstrela-dev/Alfasoft2.git
cd Alfasoft
```

2. **Copie seu `.env`**

```bash
cp .env.example .env
```

Ajuste variáveis se necessário:

```dotenv
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

3. **Inicie tudo**

```bash
docker-compose up -d --build
```

4. **Rode migrations e seeders**

```bash
docker-compose exec app php artisan migrate:fresh --seed
```

5. **Acesse a aplicação**

- http://localhost:8000
- Página de login: `/login`
- Home: `/home`

---

## 👤 Autenticação

**Usuário Admin (seed)**

- Email: `admin@alfasoft.com`
- Senha: `alfasoft`

---

## 📚 Endpoints Principais

| Método | Rota                | Middleware | Ação                       |
| ------ | ------------------- | ---------- | -------------------------- |
| GET    | /login              | guest      | Exibe formulário de login  |
| POST   | /login              | guest      | Processa login             |
| POST   | /logout             | auth       | Processa logout            |
| GET    | /home               | auth       | Lista contatos             |
| GET    | /contacts/create    | auth       | Formulário novo contato    |
| POST   | /contacts           | auth       | Armazena novo contato      |
| GET    | /contacts/{id}      | auth       | Mostra detalhes do contato |
| GET    | /contacts/{id}/edit | auth       | Formulário de edição       |
| PUT    | /contacts/{id}      | auth       | Atualiza contato           |
| DELETE | /contacts/{id}      | auth       | Exclui contato             |

---

## 🔍 Busca e Ordenação

- Busca: `/home?q=nome`
- Resultados paginados (22 por página)
- Ordenação alfabética por nome

---

## 💾 Banco de Dados

- Migrations: `database/migrations/`
- Factory: `database/factories/ContactFactory.php`
- Seeder: `database/seeders/ContactsTableSeeder.php`

Campos adicionais: cidade, endereço, skype, telefone, data de nascimento

---

## ⚙️ Variáveis de Ambiente

```dotenv
APP_NAME="WeCalled"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

---

## 📦 Deploy

1. Envie tudo via SFTP ou Cyberduck para `html/`
2. Ajuste o `.env` remoto
3. No servidor, execute:

```bash
composer install --optimize-autoloader --no-dev
php artisan migrate --force
php artisan db:seed --force
```

---

## 📖 Referências

- [Laravel Documentation](https://laravel.com/docs/12.x)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [Docker para Laravel](https://laravel.com/docs/12.x/sail)

---

> Desenvolvido por **Matheus Estrela** · Belo Horizonte – MG  
> **GitHub**: [https://github.com/MatheusEstrela-dev](https://github.com/MatheusEstrela-dev)  
> **LinkedIn**: [https://www.linkedin.com/in/matheus-estrela-32072a104/](https://www.linkedin.com/in/matheus-estrela-32072a104/)
