@servers(['localhost' => '127.0.0.1'])

@setup
    $repo = 'git@github.com:elisad5791/barber.git';
    $appDir = '/var/www/elisad-apps.ru';
    $branch = 'main';
    $date = date('YmdHis');
    $builds = $appDir . '/releases';
    $deployment = $builds . '/' . $date;
    $serve = $appDir . '/current';
    $env = $appDir . '/.env';
    $storage = $appDir . '/storage';
@endsetup

@story('deploy')
    git
    install
    live
@endstory

@task('git')
    echo "Cloning repository..."
    git clone -b {{ $branch }} "{{ $repo }}" {{ $deployment }}
@endtask

@task('install')
    echo "Start install..."
    cd {{ $deployment }}
    rm -rf {{ $deployment }}/storage
    ln -nfs {{ $env }} {{ $deployment }}/.env
    ln -nfs {{ $storage }} {{ $deployment }}/storage
    composer install --no-interaction --prefer-dist --optimize-autoloader
    php artisan migrate:fresh --seed --force
    php artisan storage:link
@endtask

@task('live')
    echo "Updating symlink..."
    ln -nfs {{ $deployment }} {{ $serve }}
@endtask
