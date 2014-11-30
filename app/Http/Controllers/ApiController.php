<?php namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Transformers\Transformer;


class ApiController extends Controller {

	/**
	 * Stores Html Status Code
	 * 
	 * @var integer
	 */
	protected $statusCode = 200;

	/**
	 * $statusCode Getter
	 * 
	 * @return integer
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * $statusCode Setter
	 * 
	 * @param integer
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	/*
	|--------------------------------------------------------------------------
	| Respond Helpers
	|--------------------------------------------------------------------------
	|
	| Here is where you can register all of the routes for an application.
	| It's a breeze. Simply tell Laravel the URIs it should respond to
	| and give it the Closure to execute when that URI is requested.
	|
	*/
	public function respondPaginate(LengthAwarePaginator $paginator, Transformer $dataTransformer)
	{
		return $this->respond([
			'paginator' => [
				'total'			=> $paginator->total(),
				'limit' 		=> intval($paginator->perPage()),
				'pagesTotal'	=> ceil($paginator->total() / $paginator->perPage()),
				'pagesCurrent'	=> $paginator->currentPage(),
				'nextUrl'		=> $paginator->nextPageUrl(),
				'prevUrl'		=> $paginator->previousPageUrl(),
			],
			'data' => $dataTransformer->transformCollection($paginator->items()),
		]);
	}

	/**
	 * Not Found Error
	 *
	 * @param $message string
	 * @return json array
	 */
	public function respondNotFound($message = 'Not Found!')
	{	
		return $this->setStatusCode(404)->respondWithError($message);
	}

	/**
	 * Failed Validation Error
	 *
	 * @param $message string
	 * @return json array
	 */
	public function respondValidationError($message = 'Failed Validation!')
	{	
		return $this->setStatusCode(422)->respondWithError($message);
	}

	/**
	 * Internal Error
	 *
	 * @param $message string
	 * @return json array
	 */
	public function respondInternalError($message = 'Internal Error!')
	{	
		return $this->setStatusCode(500)->respondWithError($message);
	}

	/**
	 * Created Successfully
	 *
	 * @param $message string
	 * @return json array
	 */
	public function respondCreated($message = 'Successfully Created!')
	{	
		return $this->setStatusCode(201)->respondWithSuccess($message);
	}

	/**
	 * Updated Successfully
	 *
	 * @param $message string
	 * @return json array
	 */
	public function respondUpdated($message = 'Successfully Updated!')
	{	
		return $this->setStatusCode(200)->respondWithSuccess($message);
	}

	/**
	 * Destroyed Successfully
	 *
	 * @param $message string
	 * @return json array
	 */
	public function respondDeleted($message = 'Successfully Deleted!')
	{	
		return $this->setStatusCode(200)->respondWithSuccess($message);
	}

	/**
	 * Create error array
	 * 
	 * @param  $message string
	 * @return json array
	 */
	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'message' 		=> $message,
				'statusCode'	=> $this->statusCode,
			]
		]);
	}

	/**
	 * Create success array
	 * 
	 * @param  $message string
	 * @return json array
	 */
	public function respondWithSuccess($message)
	{
		return $this->respond([
			'success' => [
				'message' 		=> $message,
				'statusCode'	=> $this->statusCode,
			]
		]);
	}


	/**
	 * Create JSON response
	 * 
	 * @param  $data array
	 * @param  $headers array
	 * @return json array
	 */
	public function respond($data, $headers = [])
	{
		return response()->json($data, $this->getStatusCode(), $headers);
	}	


}