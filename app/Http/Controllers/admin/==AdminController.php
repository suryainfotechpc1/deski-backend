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


class AdminController extends Controller
{
    //
	public function getMenu(){ 
		$menu = Menu::where('is_deleted','0')->get();
		return view('admin.menu',['menu' => $menu]);
	}
	
	public function addMenu(Request $request){
		$id = $request->id;
		$menu = $request->menu;
		
		if($id){
				$menu_obj = Menu::find($id);
				$menu_obj->name = $menu;
				$menu_obj->save();
				return redirect()->back();
		}else{
			
			$menu_obj = Menu::where('name',$menu)->where('is_deleted','0')->first();
			
			if(empty($menu_obj)){
				$addmenu = new Menu();
				$addmenu->name = $menu;
				$addmenu->save();
				// return redirect()->back()->with('success', 'Menu added Successfully.');
				return redirect()->back()->with('success', 'Menu added Successfully.');
			}else{
				return redirect()->back()->with('failed', 'Menu already exists.');
			}
		}
		
	}
	
	public function deleteMenu(Request $request){
		$id = $request->id;
		$menu = Menu::find($id);
		$menu->is_deleted = '1';
		$menu->save();
		
		return redirect()->back();
	}
	
	public function getSlider(){
		return view('admin.slider');
	}
	
	public function getHome(){
		$slider_image = Slider::where('is_deleted', '0')->get();
		$home = PageContent::where('page', 'home')->get();
		return view('admin.home',['sliders' => $slider_image, 'homes' => $home]);
	}
	
	public function addSliderImage(Request $request){
	
		if($request->hasFile('sliderimage')) {
			
			$allowedfileExtension=['jpeg','jpg','png','gif','svg'];
			$files = $request->file('sliderimage');

			$extension = $files->getClientOriginalExtension();
			$check = in_array($extension,$allowedfileExtension);

			 if($check){
				 
				 $imageName = time().'_slider.'.$extension;
				 $files->move(public_path('images/sliderImages'), $imageName);
				 $pathname = asset('images/sliderImages').'/'.$imageName;

				 $slider = new Slider();
				 $slider->slider_image = $pathname;
				 $slider->save();
				 
			 }
		}
		return redirect()->back();
		
	}
	
	public function deleteSlider(Request $request){
		// print_r($request->id);
		$delete_slider = Slider::find($request->id)->forceDelete();
		return redirect()->back();
		
	}
	
	public function getContact(){
		$contacts = Contact::all();
		return view('admin.contact',['contactpagedetails'=>$contacts]);
	}
	
	public function addSectionContent(Request $request){
		$id = $request->id;
		
		if($id){
			
			$contact_details = Contact::find($id);
			if($contact_details){
				
				$contact_details->content = $request->section_content;
				$contact_details->save();
				
			}else{
				
				if($id == 1){
					$contact = new Contact;
					$contact->title = "Location";
					$contact->content = $request->section_content;
					$contact->save();
				}elseif($id == 2){
					$contact = new Contact;
					$contact->title = "Contact";
					$contact->content = $request->section_content;
					$contact->save();
				}elseif($id == 3){
					$contact = new Contact;
					$contact->title = "Social Media";
					$contact->content = $request->section_content;
					$contact->save();
				}
			}
		}
			
			return redirect()->back();	
		
	}
	
	
	public function addPageSectionContent(Request $request) {
		
		// $id = $request->id;
		// $page = $request->page;
		
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
		// $pageSection = new PageContent();
		// $pageSection->page = $request->page;
		// $pageSection->section_id = $request->id;
		// $pageSection->title = $request->title;
		// $pageSection->subtitle = $request->subtitle;
		
		// if($request->hasFile('bg_img')) {
			
			// $allowedfileExtension=['jpeg','jpg','png','gif','svg'];
			// $files = $request->file('bg_img');

			// $extension = $files->getClientOriginalExtension();
			// $check = in_array($extension,$allowedfileExtension);

			 // if($check){
				 
				 // $imageName = time().'_bg_image.'.$extension;
				 // $files->move(public_path('images/backgroundImages'), $imageName);
				 // $pathname = asset('images/backgroundImages').'/'.$imageName;
				 
				 // $pageSection->bg_img = $pathname;
				 
			 // }
		// }
		
		// if($request->hasFile('side_img')) {
			
			// $allowedfileExtension=['jpeg','jpg','png','gif','svg'];
			// $files = $request->file('side_img');

			// $extension = $files->getClientOriginalExtension();
			// $check = in_array($extension,$allowedfileExtension);

			 // if($check){
				 
				 // $imageName = time().'_side_img.'.$extension;
				 // $files->move(public_path('images/sideImages'), $imageName);
				 // $pathname = asset('images/sideImages').'/'.$imageName;
				 
				 // $pageSection->side_img = $pathname;
				 
			 // }
		// }
		
		
		// $pageSection->content = $request->section_content;
		// $pageSection->save();
		
		return redirect()->back();	
	}
	
	public function saveWhatWeDo(Request $request) {
		$content = [];
		for($i = 0; $i < count($request->box_title); $i++){
			$arr['title'] = $request->box_title[$i];
			$arr['content'] = $request->content[$i];
			$content[] = $arr;
		}
		$pageContent = PageContent::where('page', 'home')->where('section_id', '2')->first();
		$pageContent->title = $request->title;
		$pageContent->content = json_encode($content);
		$pageContent->save();
		return redirect()->back();
	}
	
	
	
	public function getAbout(){
		$slider_image = Slider::where('is_deleted', '0')->get();
		$about = PageContent::where('page', 'about')->get();
		return view('admin.about',['sliders' => $slider_image, 'about' => $about]);
	}
	
	
	
	public function getCategory(){ 
		$category = CategoryPort::where('is_deleted','0')->get();
		return view('admin.category',['category' => $category]);
	}
	
	public function addCategory(Request $request){
		$id = $request->id;
		$menu = $request->menu;
		$type = $request->type;
		
		if($id){
			
			
				$menu_obj = CategoryPort::find($id);
				$menu_obj->category = $menu;
				$menu_obj->type = $type;
				$menu_obj->save();
				
				return redirect()->back();
			
			
		}else{
			
			
				$addmenu = new CategoryPort();
				$addmenu->category = $menu;
				$addmenu->type = $type;
				$addmenu->save();
				// return redirect()->back()->with('success', 'Menu added Successfully.');
				return redirect()->back()->with('success', 'Category added Successfully.');
			
			
		}
		
	}
	
	public function deleteCategory(Request $request){
		$id = $request->id;
		$menu = CategoryPort::find($id);
		$menu->is_deleted = '1';
		$menu->save();
		
		return redirect()->back();
	}
	
	public function getPortfolio(){
		$portfolio = PageContent::where('page', 'portfolio')->get();
		$portfolionew = Portfolio::where('is_deleted','0')->get();
		$catde = CategoryPort::where('is_deleted','0')->get();
		
		return view('admin.portfolio',['portfolio' => $portfolio, 'portfolionew' => $portfolionew, 'catde' => $catde]);
	}
	
	public function addPortfolio(Request $request){
		$id = $request->id;
		$title = $request->title;
		$cat = $request->category;
	
		if($id){

				$menu_obj = Portfolio::find($id);
				$menu_obj->category = $cat;
				$menu_obj->title = $title;
				$menu_obj->save();
				
				return redirect()->back();
			
		}else{

			$pageSection = new Portfolio();
			$pageSection->title = $request->title;
			$pageSection->category = $request->subtitle;
			$pageSection->type = $request->type;
			
			
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
	public function deletePortfolio(Request $request){
		$id = $request->id;
		$menu = Portfolio::find($id);
		$menu->is_deleted = '1';
		$menu->save();
		
		return redirect()->back();
	}
	
	public function getServices(){
		$slider_image = Slider::where('is_deleted', '0')->get();
		$services = PageContent::where('page', 'services')->get();
		return view('admin.services',['services' => $services]);
	}
	public function saveServices(Request $request) {
		$content = [];
		for($i = 0; $i < count($request->box_title); $i++){
			$arr['title'] = $request->box_title[$i];
			$arr['content'] = $request->content[$i];
			$content[] = $arr;
		}
		$page = $request->page;
		$sec = $request->section_id;
		$pageContent = PageContent::where('page', $page)->where('section_id', $sec)->first();
		$pageContent->title = $request->title;
		$pageContent->subtitle = $request->subtitle;
		$pageContent->content = json_encode($content);
		$pageContent->save();
		return redirect()->back();
	}
	
	public function getSolution(){
		$slider_image = Slider::where('is_deleted', '0')->get();
		$solution = PageContent::where('page', 'solution')->get();
		return view('admin.solution',['solution' => $solution]);
	}
	
	public function getTerms(){
		$terms = PageContent::where('page', 'terms')->get();
		return view('admin.terms',['terms' => $terms]);
	}
	
	public function getPrivacy(){
		$privacy = PageContent::where('page', 'privacy')->get();
		return view('admin.privacy',['privacy' => $privacy]);
	}
}
