<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $storeNamespace = 'App\Http\Controllers\Store';
    protected $driverNamespace = 'App\Http\Controllers\Driver';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

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

      // new
      \Config::set('filesystems.disks.public.url', url('storage'));

      \Config::set('filesystems.disks.local.root', storage_path('app/public') );

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        // new
        $this->mapWebadminRoutes();

        //
//        $this->mapStoreRoutes();
//        $this->mapDriverRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */


     protected function mapWebadminRoutes() {
   		Route::middleware(['web', 'Lang'])
   			->namespace($this->namespace)
   			->group(base_path('routes/admin.php'));
   	}


   	protected function mapWebRoutes() {
   		Route::middleware(['web', 'Lang'])
   			->namespace($this->namespace)
   			->group(base_path('routes/web.php'));
   	}

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
//    protected function mapStoreRoutes()
//    {
//        Route::middleware('web')
//            ->namespace($this->storeNamespace)
//            ->group(base_path('routes/store.php'));
//    }


    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
//    protected function mapDriverRoutes()
//    {
//        Route::middleware('web')
//            ->namespace($this->driverNamespace)
//            ->group(base_path('routes/driver.php'));
//    }

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
}
