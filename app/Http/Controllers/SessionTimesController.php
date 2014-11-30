<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PaginateRequest;
use App\Http\Controllers\Controller;
use App\Http\Transformers\SessionTimesTransformer;
use App\SessionTimes;
use App\Movies;


class SessionTimesController extends ApiController {


	public function index(SessionTimesTransformer $transformer, PaginateRequest $request)
	{
		$limit = $request->get('limit', 5);
		$sessions = SessionTimes::paginate($limit);
		
		return $this->respondPaginate($sessions, $transformer);
	}



}
