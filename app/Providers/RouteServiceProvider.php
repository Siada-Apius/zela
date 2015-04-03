<?php namespace App\Providers;

use App\Article;
use App\Tag;
use App\User;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        $router->bind('articles', function($param)
        {
            if (!Article::whereUri($param)->first())
            {
                abort(404);
            }

            return Article::whereUri($param)->first();
        });

        $router->bind('tags', function($param)
        {
            if (!Tag::whereName($param)->first())
            {
                abort(404);
            }

            return Tag::whereName($param)->first();
        });

        $router->bind('users', function($param)
        {
            if (!User::whereName($param)->first())
            {
                abort(404);
            }

            return User::whereName($param)->first();
        });

	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
