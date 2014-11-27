<?php namespace App\Http\Controllers;

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
	 * @param $statusCode integer
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}



	/**
	 * Not Found Error
	 *
	 * @param $message string
	 * @return JSON response
	 */
	public function respondNotFound($message = 'Not Found!')
	{	
		return $this->setStatusCode(404)->respondWithError($message);
	}


	/**
	 * Internal Error
	 *
	 * @param $message string
	 * @return JSON response
	 */
	public function respondInternalError($message = 'Internal Error!')
	{	
		return $this->setStatusCode(500)->respondWithError($message);
	}


	/**
	 * Create error array
	 * 
	 * @param  $message string
	 * @return JSON response
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
	 * Create JSON response
	 * 
	 * @param  $data array
	 * @param  $headers array
	 * @return  JSON response
	 */
	public function respond($data, $headers = [])
	{
		return response()->json($data, $this->getStatusCode(), $headers);
	}	


}