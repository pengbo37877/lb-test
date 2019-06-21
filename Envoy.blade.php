@servers(['web-1' => 'root@120.25.207.77', 'web-2' => 'root@120.79.191.149', 'web-3' => 'root@47.106.185.192'])

@task('deploy', ['on' => ['web-1', 'web-2', 'web-3'], 'parallel' => true])
    cd /var/www/lb-test
    git pull origin master
    chown -R nginx:nginx .
    chmod -R 777 storage
    echo "" > storage/logs/laravel.log
    composer install --no-dev
@endtask