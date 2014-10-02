<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class BaseController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /base
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /base/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /base
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /base/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$controller = get_called_class();

		$model = $controller::$model;

		$query = $model::query();

		if (!empty($id))
       	{
       		$query = $model::byId($id, $query);
       	}

   		// Handle filters
   		if (Input::has('filter'))
   		{
   			$query = $model::addFilters($query);
   		}

   		// Handle fields
		if (Input::has('fields'))
		{
			$query = $model::addFields($query);
		}

		// Handle sorts
		if (Input::has('sort'))
		{
			$query = $model::addSorts($query);
		}

		// Handle limit
		if (Input::has('limit'))
		{
			$query = $query->take(Input::get('limit'));
		}

		// Handle offset
		if (Input::has('offset'))
		{
			$query = $query->skip(Input::get('offset'));
		}

		$results = $query->get();

		if (!empty($model::$attachables))
		{
			$i=0;
			foreach ($results as $result)
			{
				foreach ($model::$attachables as $column => $value)
				{
					// Model of the special filter cases
   					$filter_model = studly_case($column);
   					$attachable = $filter_model::byId($value)->first();

   					if ($attachable->id == $result->{$column.'_id'})
   					{
   						$result->$column = $attachable->toArray();
   					}
   					else
   					{
   						unset($results[$i]);
   					}
				}
				$i++;
			}
		}

       	if (!$results->count())
       	{
       		return App::abort(204);
       	}

       	echo $results->toJson();
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /base/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /base/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /base/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}