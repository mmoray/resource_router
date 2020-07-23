<?php

namespace MatthewMoray\Assessment;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class ResourceRouteProvider extends RouteServiceProvider
{
    const FILE_NAME = 'routes/routes.php';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (!file_exists(base_path(self::FILE_NAME))) {
            file_put_contents(base_path(self::FILE_NAME), sprintf("<?php%s%suse MatthewMoray\Assessment\Route;%s%s", PHP_EOL, PHP_EOL, PHP_EOL, PHP_EOL)); 
        }
        Route::namespace($this->namespace)
            ->group(base_path(self::FILE_NAME));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
