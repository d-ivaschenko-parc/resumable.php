<?php
namespace Dilab\Network;

use Dilab\Network\Request;
use Illuminate\Http\Request as LaravelHttpRequest;

class LaravelRequest implements Request
{
	private $request;
	public function __construct()
	{
		$this->request = \App::make(LaravelHttpRequest::class);
	}

	/**
	 * @param $type get/post
	 * @return boolean
	 */
	public function is($type)
	{
		return $this->request->method() == $type;
	}

	/**
	 * @param $requestType GET/POST
	 * @return mixed
	 */
	public function data($requestType)
	{
		return $this->request->all();
	}

	/**
	 * @return FILES data
	 */
	public function file()
	{
		if (empty($this->request->files)) {
			return [];
		}

		return array_shift($this->request->files);
	}

}