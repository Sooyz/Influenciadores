# Influenciadores
1. Auth + bootstrap
2. Cadastro de Influenciador(a)
3. Busca de informações na API do Instagram


# Comandos para execução

1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. configurar variaveis .env para conexao com o banco de dados
5. php artisan migrate
6. php artisan db:seed --class=RedeSeeder
7. php artisan db:seed --class=UserSeeder
8. Alterar arquivo vendor/laravel/ui/auth-backend/AuthenticatesUsers.php 
    linha 157{
        de: return 'email'
        para: return 'user'
    }
    (Login utilizando campo user)
9. php artisan serve (localhost:8080)
10. Logins para teste: leomessi, therock, cristiano, beyonce, kimkardashian, arianagrande, selenagomez e justinbieber.
11. Senha para todos os logins pré cadastrados: 12345
