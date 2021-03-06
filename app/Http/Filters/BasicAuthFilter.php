<?php namespace Elementary\Http\Filters;

use Illuminate\Contracts\Auth\Authenticator;

class BasicAuthFilter {

	/**
	 * The authenticator implementation.
	 *
	 * @var Authenticator
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Authenticator  $auth
	 * @return void
	 */
	public function __construct(Authenticator $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Run the request filter.
	 *
	 * @return mixed
	 */
	public function filter()
	{
		return $this->auth->basic();
	}

}
