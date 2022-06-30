<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\PageContent;
use App\Models\CategoryPort;
use App\Models\Portfolio;
use App\Models\Services;

class ServicesController extends Controller
{
	
	public function getServicesPage(){
		$services = PageContent::where('page', 'services')->get();
		$servicelist = Services::where('is_deleted', '0')->get();
		return view('admin.services',['services' => $services, 'servicelist' => $servicelist]);
	}
	
	public function getServices(Request $request){
		$id = $request->id;
		$servicesedit = Services::where('is_deleted','0')->where('id', $id)->get();
		return view('admin.add_services',['servicesedit' => $servicesedit]);
	}
	
	public function getViewServices(){
		$servicelist = Services::where('is_deleted', '0')->get();
		return view('admin.view_services',['servicelist' => $servicelist]);
	}

	public function addServices(Request $request){
		$id = $request->id;
		$title = $request->title;
		$cat = $request->category;
	
		if($id){

				$menu_obj = Services::find($id);
				$menu_obj->short_content = $request->subtitle;
				$menu_obj->title = $title;
				$menu_obj->content = $request->content;
				
				if($request->hasFile('side_img')) {
				
				$allowedfileExtension=['jpeg','jpg','png','gif','svg'];
				$files = $request->file('side_img');

				$extension = $files->getClientOriginalExtension();
				$check = in_array($extension,$allowedfileExtension);

				 if($check){
					 
					 $imageName = time().'_side_img.'.$extension;
					 $files->move(public_path('images/sideImages'), $imageName);
					 $pathname = asset('images/sideImages').'/'.$imageName;
					 
					 $menu_obj->img = $pathname;
					 
				 }
			}
				
				
				$menu_obj->save();
				
				return redirect()->back();
			
		}else{

			$pageSection = new Services();
			$pageSection->title = $request->title;
			$pageSection->short_content = $request->subtitle;

			
			if($request->hasFile('side_img')) {
				
				$allowedfileExtension=['jpeg','jpg','png','gif','svg'];
				$files = $request->file('side_img');

				$extension = $files->getClientOriginalExtension();
				$check = in_array($extension,$allowedfileExtension);

				 if($check){
					 
					 $imageName = time().'_side_img.'.$extension;
					 $files->move(public_path('images/sideImages'), $imageName);
					 $pathname = asset('images/sideImages').'/'.$imageName;
					 
					 $pageSection->img = $pathname;
					 
				 }
			}
			$pageSection->content = $request->content;
			$pageSection->save();	
	
		}
		return redirect()->back();
		
	}
	public function deleteServices(Request $request){
		$id = $request->id;
		$menu = Services::find($id);
		$menu->is_deleted = '1';
		$menu->save();
		
		return redirect()->back();
	}
	
	
	
	
	public function addPageSectionContent(Request $request) {
	
		
		$updatePageSection = PageContent::where('page', $request->page)->where('section_id', $request->section_id)->first();
		
		if($updatePageSection){
			if(!empty($request->title)){
				$updatePageSection->title = $request->title;
			}
			if(!empty($request->subtitle)){
				$updatePageSection->subtitle = $request->subtitle;
			}
			
			if($request->hasFile('bg_img')) {
				if(!empty($request->file('bg_img'))){
					
					$allowedfileExtension=['jpeg','jpg','png','gif','svg'];
					$files = $request->file('bg_img');

					$extension = $files->getClientOriginalExtension();
					$check = in_array($extension,$allowedfileExtension);

					 if($check){
						 
						 $imageName = time().'_bg_image.'.$extension;
						 $files->move(public_path('images/backgroundImages'), $imageName);
						 $pathname = asset('images/backgroundImages').'/'.$imageName;
						 
						 $updatePageSection->bg_img = $pathname;
						 
					 }
				}
			}
			
			if($request->hasFile('side_img')) {
				
				if(!empty($request->file('side_img'))){
				
					$allowedfileExtension=['jpeg','jpg','png','gif','svg'];
					$files = $request->file('side_img');

					$extension = $files->getClientOriginalExtension();
					$check = in_array($extension,$allowedfileExtension);

					 if($check){
						 
						 $imageName = time().'_side_img.'.$extension;
						 $files->move(public_path('images/sideImages'), $imageName);
						 $pathname = asset('images/sideImages').'/'.$imageName;
						 
						 $updatePageSection->side_img = $pathname;
						 
					 }
				}
			}

			
			if(!empty($request->section_content)){
				$updatePageSection->content = $request->section_content;
			}
			
			$updatePageSection->save();
		}else{
			
			$pageSection = new PageContent();
			$pageSection->page = $request->page;
			$pageSection->section_id = $request->section_id;
			$pageSection->title = $request->title;
			$pageSection->subtitle = $request->subtitle;
			
			if($request->hasFile('bg_img')) {
				
				$allowedfileExtension=['jpeg','jpg','png','gif','svg'];
				$files = $request->file('bg_img');

				$extension = $files->getClientOriginalExtension();
				$check = in_array($extension,$allowedfileExtension);

				 if($check){
					 
					 $imageName = time().'_bg_image.'.$extension;
					 $files->move(public_path('images/backgroundImages'), $imageName);
					 $pathname = asset('images/backgroundImages').'/'.$imageName;
					 
					 $pageSection->bg_img = $pathname;
					 
				 }
			}
			
			if($request->hasFile('side_img')) {
				
				$allowedfileExtension=['jpeg','jpg','png','gif','svg'];
				$files = $request->file('side_img');

				$extension = $files->getClientOriginalExtension();
				$check = in_array($extension,$allowedfileExtension);

				 if($check){
					 
					 $imageName = time().'_side_img.'.$extension;
					 $files->move(public_path('images/sideImages'), $imageName);
					 $pathname = asset('images/sideImages').'/'.$imageName;
					 
					 $pageSection->side_img = $pathname;
					 
				 }
			}
			$pageSection->content = $request->section_content;
			$pageSection->save();			
		}

		return redirect()->back();	
	}
	
	

}
