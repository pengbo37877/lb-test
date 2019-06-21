<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://github.com/pengbo37877/lb-test.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('root@120.25.207.77')
    ->set('deploy_path', '/var/www/lb-test');

host('root@120.79.191.149')
    ->set('deploy_path', '/var/www/lb-test');

host('root@47.106.185.192')
    ->set('deploy_path', '/var/www/lb-test');
    
// Tasks

task('update', function () {
    run('./update.sh');
});

// [Optional] if deploy fails automatically unlock.
//after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');
