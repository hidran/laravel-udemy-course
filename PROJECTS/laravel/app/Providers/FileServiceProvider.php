<?php

namespace LaraCourse\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use League\Flysystem\Directory;

class FileServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'LaraCourse\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $dir = new \DirectoryIterator(base_path('routes'));
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                //            var_dump($fileinfo->getFilename());
                $filename = $fileinfo->getFilename();
                $route = str_replace('.php', '', $filename);
                $method = 'map' . ucfirst($route) . 'Routes';
                if (method_exists($this, $method)) {
                    $this->$method();
                } else {
                    Route::middleware($route)
                        ->namespace($this->namespace)
                        ->group(base_path('routes/' . $filename));
                }

            }
        }


        $this->mapApiRoutes();
        $this->mapPageRoutes();
        $this->mapWebRoutes();
        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));

    }

    protected function mapPageRoutes()
    {
        Route::prefix('pages')
            ->namespace($this->namespace)
            ->group(base_path('routes/pages.php'));

    }
}
