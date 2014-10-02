<?php namespace Elementary\Providers;

use Illuminate\Foundation\Support\Providers\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

	/**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
	protected $before = [
		'Elementary\Http\Filters\MaintenanceFilter',
	];

	/**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
	protected $after = [
		//
	];

	/**
	 * All available route filters.
	 *
	 * @var array
	 */
	protected $filters = [
		'auth' => 'Elementary\Http\Filters\AuthFilter',
		'auth.basic' => 'Elementary\Http\Filters\BasicAuthFilter',
		'csrf' => 'Elementary\Http\Filters\CsrfFilter',
		'guest' => 'Elementary\Http\Filters\GuestFilter',
	];

}
