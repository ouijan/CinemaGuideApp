<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCinemasRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' 		=> '',
			'address'	=> '',
			'geo_lat'	=> 'regex:/[+-]?\d{0,4}\.\d{0,6}/',
			'geo_long'	=> 'regex:/[+-]?\d{0,4}\.\d{0,6}/',
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
