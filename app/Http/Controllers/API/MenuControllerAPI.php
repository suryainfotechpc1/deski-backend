<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;


class MenuControllerAPI extends Controller
{
    //
	public function getMenu(){
		$menu = Menu::where('is_deleted','0')->get();
		return $menu;
		// return "hello";
	}
}
