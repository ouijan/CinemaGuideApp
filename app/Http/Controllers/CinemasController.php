<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Transformers\CinemasTransformer;
use App\Http\Transformers\SessionTimesTransformer;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\CreateCinemasRequest;
use App\Http\Requests\UpdateCinemasRequest;
use App\Http\Requests\DestroyCinemasRequest;
use App\Cinemas;

class CinemasController extends ApiController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return json array
	 */
	public function index(CinemasTransformer $transformer, PaginateRequest $request)
	{

		$limit = $request->get('limit', 5);
		$cinemas = Cinemas::paginate($limit);

		return $this->respondPaginate($cinemas, $transformer);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return json array
	 */
	public function store(CreateCinemasRequest $request)
	{
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
	 * @return json array
	 */
	public function show(CinemasTransformer $transformer, $id)
	{
		$cinema = Cinemas::find($id);
		if ( !isset($cinema) ) return $this->respondNotFound('Cinema does not exist.');

		return $this->respond([
			'data' => $transformer->transform($cinema),
		]);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return json
	 */
	public function destroy($id)
	{
		$cinema = Cinemas::find($id);

		if (!isset($cinema)) return $this->respondNotFound('Cinema does not exist.');

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
	public function sessions(SessionTimesTransformer $transformer, PaginateRequest $request, $id)
	{
		$limit = $request->get('limit', 5);
		$date = $request->get('date');

		$sessions = Cinemas::findOrFail($id)->sessionTimes();

		// Filter data
		if ($date) $sessions->where('date_time', 'like','%'.$date.'%');

		$sessions = $sessions->paginate($limit);

		return $this->respondPaginate($sessions, $transformer);
	}


}