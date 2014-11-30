<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaginateRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'limit' 	=> 'integer',
			'offset'	=> 'integer',
			'page'		=> 'integer',
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
