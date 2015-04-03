<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title'     => 'required|min:3',
			'title_rus' => 'required|min:3',
			'title_eng' => 'min:3',
            'uri'       => 'required|min:3|alpha_dash',
            'short'     => 'required',
            'short_rus' => 'required',
            'short_eng' => 'min:3',
            'full'      => 'required',
            'full_rus'  => 'min:3',
            'full_eng'  => 'min:3',
            'add_file'  => '',
		];
	}

}
