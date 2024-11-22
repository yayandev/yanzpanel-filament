
<summary>

    - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    git clone https://github.com/isaandreanme/filament-starter.git
    cd filament-starter
    cp .env.example .env
    composer update
    php artisan key:generate
    php artisan migrate
    php artisan migrate:fresh --seed
    php artisan optimize:clear
    php artisan shield:setup
    php artisan shield:generate --all
    php artisan shield:super-admin
    php artisan storage:link
    npm install
    npm run build
    php artisan serve

    note :
    Before Run Migration Setup Your .env
    You should run `shield:install --fresh` ?
    Answer/Select : No!
      
    - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    'email'     =   'superadmin@gmail.com'
    'password'  =   'password'

    - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    Still In The Development Process

    - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

</summary>
<br>

## Screenshot

<summary> 
<p align="center">
                <img src="https://raw.githubusercontent.com/isaandreanme/filament-starter/refs/heads/main/ss/1.png" />
                <img src="https://raw.githubusercontent.com/isaandreanme/filament-starter/refs/heads/main/ss/2.png" />


</p>
</summary>

## Demo

## Framework

<p align="center">
    <a href="https://github.com/filamentphp/filament/actions"><img alt="Filament" src="https://img.shields.io/badge/Filament-v3.x-orange?style=for-the-badge"></a>
    <a href="https://laravel.com"><img alt="Laravel v10.x" src="https://img.shields.io/badge/Laravel-v11.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://livewire.laravel.com"><img alt="Livewire v3.x" src="https://img.shields.io/badge/Livewire-v3.x-FB70A9?style=for-the-badge"></a>
    <a href="https://php.net"><img alt="PHP 8.2" src="https://img.shields.io/badge/PHP-8.2x-777BB4?style=for-the-badge&logo=php"></a>
</p>

