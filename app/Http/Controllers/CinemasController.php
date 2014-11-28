<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Transformers\CinemasTransformer;
use App\Http\Transformers\SessionTimesTransformer;
use App\Http\Requests\CreateCinemasRequest;
use App\Http\Requests\DestroyCinemasRequest;
use App\Cinemas;

class CinemasController extends ApiController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(CinemasTransformer $transformer)
	{
		$cinemas = Cinemas::all();

		return $this->respond([
			'data' => $transformer->transformCollection($cinemas->toArray())
		]);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateCinemasRequest $request)
	{
		// input Validation failed
		//return $this->respondValidationError('Input failed validation');
		
		Cinemas::create([
			'name'		=> $request->name,
			'address'	=> $request->address,
			'geo_lat'	=> $request->geo_lat,
			'geo_long'	=> $request->geo_long,
		]);

		return $this->respondCreated('Cinema Succcessfully Created!');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(CinemasTransformer $transformer, $id)
	{
		$cinema = Cinemas::findOrFail($id);

		if( !$cinema )
		{
			return $this->respondNotFound('Cinema does not exist.');
		}

		return $this->respond([
			'data' => $transformer->transform($cinema),
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		return $id;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return JSON Response
	 */
	public function destroy($id)
	{
		$cinema = Cinemas::findOrFail($id);

		if( !$cinema )
		{
			return $this->respondNotFound('Cinema does not exist.');
		}

		Cinemas::destroy($id);

		return $this->respondDeleted('Cinema Succcessfully Deleted!');
	}

	/**
	 * Shows sessionTimes of a given cinema
	 * 
	 * @param  SessionTimesTransformer - transforms data to the api json
	 * @param  $id - id of a cinema
	 * @return JSON response
	 */
	public function sessions(SessionTimesTransformer $transformer, $id)
	{
		$sessions = Cinemas::findOrFail($id)->sessionTimes;

		return $this->respond([
			'data' => $transformer->transformCollection($sessions->toArray())
		]);
	}


}