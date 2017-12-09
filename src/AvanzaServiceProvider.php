<?php

namespace Digitalsite\Avanza;

use Illuminate\Support\ServiceProvider;

/**
* 
*/
class AvanzaServiceProvider extends ServiceProvider
{
	
	 public function register()
	{
		$this->app->bind('avanza', function($app) {
			return new Avanza;

		});
	}

	public function boot()
	{
		require __DIR__ . '/Http/routes.php';


		$this->loadViewsFrom(__DIR__ . '/../views', 'avanza');

		$this->publishes([

			__DIR__ . '/migrations/2015_07_25_000000_create_usuario_table.php' => base_path('database/migrations/2015_07_25_000000_create_usuario_table.php'),

			]);


	}

}
