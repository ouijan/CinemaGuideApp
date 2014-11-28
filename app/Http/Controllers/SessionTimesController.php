<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Transformers\SessionTimesTransformer;
use App\SessionTimes;

class SessionTimesController extends ApiController {

	public function index(SessionTimesTransformer $transformer)
	{
		$sessions = SessionTimes::all();

		return $this->respond([
			'data' => $transformer->transformCollection($sessions->toArray())
		]);
	}


	public function show(SessionTimesTransformer $transformer, $id)
	{
		$session = SessionTimes::findOrFail($id);

		return $this->respond([
			'data' => $transformer->transform($session)
		]);
	}

}
