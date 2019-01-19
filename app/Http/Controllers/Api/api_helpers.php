<?php


if (! function_exists("error_api")) {
	/**
	 * @param mixed $message
	 * @param int   $httpCode
	 * @return void
	 */
	function error_api($message, int $httpCode = 400): void
	{
		http_response_code($httpCode);
		print json_encode($message, JSON_UNESCAPED_SLASHES);
		exit;
	}
}
