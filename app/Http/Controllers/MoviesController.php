<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\CreateMoviesRequest;
use App\Http\Requests\UpdateMoviesRequest;
use App\Http\Transformers\MoviesTransformer;
use App\Http\Transformers\SessionTimesTransformer;
use App\Movies;

class MoviesController extends ApiController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return json array
	 */
	public function index(MoviesTransformer $transformer, PaginateRequest $request)
	{
		$limit = $request->get('limit', 5);
		$movies = Movies::paginate($limit);

		return $this->respondPaginate($movies, $transformer);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return json array
	 */
	public function store(CreateMoviesRequest $request)
	{
		Movies::create([
			'title'		=> $request->title
		]);

		return $this->respondCreated('Movie Succcessfully Created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return json array
	 */
	public function show(MoviesTransformer $transformer, $id)
	{
		$movie = Movies::find($id);

		if ( !isset($movie) ) return $this->respondNotFound('Movie does not exist.');

		return $this->respond([
			'data' => $transformer->transform($movie),
		]);
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return json array
	 */
	public function destroy($id)
	{
		$movie = Movies::find($id);

		if (!isset($movie)) return $this->respondNotFound('Movie does not exist.');

		Movies::destroy($id);

		return $this->respondDeleted('Movie Succcessfully Deleted!');
	}

	/**
	 * Shows sessionTimes of a given movie
	 * 
	 * @param  SessionTimesTransformer - transforms data to the api json
	 * @param  $id - id of a movie
	 * @return JSON response
	 */
	public function sessions(SessionTimesTransformer $transformer, PaginateRequest $request, $id)
	{
		$limit = $request->get('limit', 5);
		$date = $request->get('date');

		$sessions = Movies::findOrFail($id)->sessionTimes();

		// filter data
		if ($date) $sessions->where('date_time', 'like','%'.$date.'%');

		$sessions = $sessions->paginate($limit);

		return $this->respondPaginate($sessions, $transformer);
	}


}