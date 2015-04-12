<?php namespace SpotifyExample\Providers;

use Illuminate\Support\ServiceProvider;
use SpotifyExample\Services\SpotifyService;

class SpotifyServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('SpotifyService', function($app)
        {
            return new SpotifyService();
        });
	}

}
