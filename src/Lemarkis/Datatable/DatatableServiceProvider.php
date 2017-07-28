<?php namespace Lemarkis\Datatable;

use Illuminate\Support\ServiceProvider;

class DatatableServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app->singleton('datatable', function($app)
		{
			return new Datatable($app['config'], $app['view'], $app['session'], $app['request']);
		});

		$this->loadViewsFrom(__DIR__.'/../../views', 'datatable');

		$this->publishes([
			__DIR__.'/../../config/config.php' => config_path('datatable.php')
		], 'config');

		if (\function_exists('resource_path')) {
			$this->publishes([
				__DIR__.'/../../views' => resource_path('views/vendor/datatable')
			], 'views');

			$this->publishes([
				__DIR__.'/../../../public' => resource_path('assets/vendor/datatable')
			], 'assets');
			$this->publishes([
				__DIR__.'/../../../lang' => resource_path('lang')
			], lang);
		} else {
			$this->publishes([
				__DIR__.'/../../views' => base_path('resources/views/vendor/datatable')
			], 'views');

			$this->publishes([
				__DIR__.'/../../../public' => base_path('resources/assets/vendor/datatable')
			], 'assets');
			$this->publishes([
				__DIR__.'/../../../lang' => base_path('resources/lang')
			], 'lang');
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
