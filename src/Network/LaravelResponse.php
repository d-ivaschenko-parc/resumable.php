<?php
namespace Dilab\Network;


class LaravelResponse implements Response
{
	/**
	 * @param $statusCode
	 * @return mixed
	 */
	public function header($statusCode)
	{
		if (200 == $statusCode) {
			return response([
				'message' => 'OK',
			], 200);

		} else if (404 == $statusCode) {
			return response([
				'message' => '404 Not Found',
			], 404);
		}
		return response([
			'message' => 'An error occurred',
		], 422);
	}

}
