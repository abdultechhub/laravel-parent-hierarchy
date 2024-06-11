<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




function getGreeting()
{
	if (Auth::guard('web')->check()) {
		$user = Auth::guard('web')->user();
		return "Welcome, <b>" . $user->name . "</b> to ...";
	} else {
		return "Welcome, Guest!";
	}
}


if (!function_exists('is_active_link')) {
	function is_active_link($url)
	{
		// Parse the current URL and the target URL
		$currentUrlPath = parse_url(request()->fullUrl(), PHP_URL_PATH);
		$targetUrlPath = parse_url($url, PHP_URL_PATH);

		// Compare only the paths
		return $currentUrlPath == $targetUrlPath ? 'active' : '';
	}
}
