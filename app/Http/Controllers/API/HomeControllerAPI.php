<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\CategoryPort;
use App\Models\PageContent;
use App\Models\Portfolio;

class HomeControllerAPI extends Controller
{
    public function getSlider(){
		$get_slider = Slider::all();
		return $get_slider;
	}
	
	 public function homesSection(){
		$homes = PageContent::where('page','home')->get();
		return $homes;
	}
	
	public function getContent(Request $request, $page = null, $id = null) {
		$homes = PageContent::where('page', $page)->where('section_id', $id)->get();
		return $homes;
	}
	
	public function getCategory($port = null) {
		$result = [];
		if($port){
			$result = CategoryPort::where('type', $port)->where('is_deleted', 0)->get();
			return $result;
		}
		return $result;
	}
	
	public function getPortfolios() {
		$result = Portfolio::with('category')->where('is_deleted', 0)->where('type', 'portfolios')->get();
		return $result;
	}
	
	public function getSinglePortfolio($id = null) {
		if($id) {
			$result = Portfolio::with('category')->where('is_deleted', 0)->first();
			return $result;
		}
		return [];
	}
	
}
