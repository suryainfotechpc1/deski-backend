@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Input')

{{-- vendor style --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/editors/quill/katex.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/editors/quill/monokai-sublime.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/editors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/editors/quill/quill.bubble.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap">
@endsection

@section('page-styles')
<link rel="stylesheet" href="{{asset('css/plugins/forms/form-quill-editor.css')}}">
@endsection

@section('content')

<style>
.actions.clearfix{
	display: none;
}
</style>
<!-- Basic Inputs start -->
<section id="basic-input">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Home</h4>
        </div>
        <div class="card-body">
			<div class="row">
			  <div class="col-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				  <a class="nav-link active" id="v-pills-slider-tab" data-toggle="pill" href="#v-pills-slider" role="tab" aria-controls="v-pills-slider" aria-selected="true">slider</a>
				  <a class="nav-link" id="v-pills-sectionOne-tab" data-toggle="pill" href="#v-pills-sectionOne" role="tab" aria-controls="v-pills-sectionOne" aria-selected="false">Banner Section</a>
				  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">WHAT WE DO</a>
				  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Reaosn to Choose us</a>
				  <a class="nav-link" id="v-pills-founder-tab" data-toggle="pill" href="#v-pills-founder" role="tab" aria-controls="v-pills-founder" aria-selected="false">Founder Note</a>
				   <a class="nav-link" id="v-pills-fearures-tab" data-toggle="pill" href="#v-pills-fearures" role="tab" aria-controls="v-pills-fearures" aria-selected="false">FEATURES</a>
				</div>
			  </div>
			  <div class="col-9">
				<div class="tab-content" id="v-pills-tabContent">
				  <div class="tab-pane fade show active" id="v-pills-slider" role="tabpanel" aria-labelledby="v-pills-slider-tab">
					  <form method="post" action="{{route('addSliderImage')}}" enctype="multipart/form-data">
						  @csrf
						  <div class="row">
								
								<div class="col-lg-6 col-md-12">
									  <label for="imageFile">Image Upload</label>
									  <input type="file" class="form-control-file" id="imageFile" name="sliderimage">
								</div>
								
								<div class="col-md-6">
									<button class="btn btn-primary" type="submit" style="position: absolute; bottom: 0;">Submit</button>
								</div>
						  </div>
					  </form>
					  <div class="imageGallery" style="display:flex;flex-wrap: wrap; margin: 20px 0px;">
						<?php //print_r($sliders);?>
						@foreach($sliders as $slider)
						<div style="position: relative;border: 1px solid #000;border-radius: 5px;margin: 5px;">
							<img src="{{$slider->slider_image}}" style="object-fit: contain;width: 225px;height: 155px;"></img>
							<a href="{{route('deleteSlider',['id' => $slider->id])}}">
								<span class="image_close" style="position: absolute;top: 0px;right: 0px;font-size: 16px;background-color: #f2f4f4;border-radius: 50%;padding: 0px 5px;">&times;</span>
							</a>
							
						</div>
						@endforeach
					  </div>
				  </div>
				  
				  <!-- Header top Start -->
				  <div class="tab-pane fade" id="v-pills-sectionOne" role="tabpanel" aria-labelledby="v-pills-sectionOne-tab">
					<form method="post" action="{{route('addPageSectionContent')}}" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<input type="hidden" value="home" name="page">
							<div class="col-md-6 mb-1">
								  <label for="side_img1">Side Image</label>
								  <input type="file" class="form-control-file" id="side_img1" name="side_img">
							</div>
							
							<div class="col-md-6 mb-1">
								@if($homes[0]->side_img)
								  <img src="{{$homes[0]->side_img}}" width="100" height="70" style="border: 1px solid #000;"></img>
								@endif
							</div>
							
						</div>
						<div id="full-wrapper">
							<textarea class="banner_editor" id="banner_editor" name="section_content">{{$homes[0]->content}}</textarea>
						</div>
						
						<div>
							<input type="hidden" value="1" name="section_id"></input>
							<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;" onclick="return saveData(1);">Save</button>
						</div>
					</form>
				  </div>
				  <!-- Header top End -->
					<!-- What We Do Section Start -->
					<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<form method="post" action="{{route('saveWhatWeDo')}}" enctype="multipart/form-data">
							@csrf
							<div class="row mb-2" style="border: 1px solid lightgray;">
								<div class="col-md-12 mb-1">
									  <label for="side_img1">Section Title</label>
									  <input type="text" class="form-control" name="title" value="{{$homes[1]->title}}" />
								</div>
							</div>
							@php 
								$arr = json_decode($homes[1]->content);
								
							@endphp
							<div class="row mb-2 py-2 box" style="border: 1px solid lightgray;">
								<h5 class="pl-1">Box 1</h5>
								<div class="col-md-12 mb-2">
									<label for="side_img1">Title :</label>
									<input type="text" class="form-control" name="box_title[]" value="{{$arr[0]->title}}" />
								</div>
								<div class="col-md-12">
									<label for="side_img1">Content :</label>
									<div class="full-wrapper">
										<textarea class="quill_editor1" id="quill_editor1" name="content[]">{{$arr[0]->content}}</textarea>
									</div>
								</div>
							</div>
							
							<div class="row mb-2 py-2 box" style="border: 1px solid lightgray;">
								<h5 class="pl-1">Box 2</h5>
								<div class="col-md-12 mb-2">
									<label for="side_img1">Title :</label>
									<input type="text" class="form-control" name="box_title[]" value="{{$arr[1]->title}}" />
								</div>
								<div class="col-md-12">
									<label for="side_img1">Content :</label>
									<div class="full-wrapper">
										<textarea class="quill_editor2" id="quill_editor2" name="content[]">{{$arr[1]->content}}</textarea>
									</div>
								</div>
							</div>
							
							<div class="row mb-2 py-2 box" style="border: 1px solid lightgray;">
								<h5 class="pl-1">Box 3</h5>
								<div class="col-md-12 mb-2">
									<label for="side_img1">Title :</label>
									<input type="text" class="form-control" name="box_title[]" value="{{$arr[2]->title}}" />
								</div>
								<div class="col-md-12">
									<label for="side_img1">Content :</label>
									<div class="full-wrapper">
										<textarea class="quill_editor3" id="quill_editor3" name="content[]">{{$arr[2]->content}}</textarea>
									</div>
								</div>
							</div>
							
							<div>
								<!--<input type="hidden" value="home" name="page">
								<input type="hidden" value="2" name="section_id">-->
								<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
							</div>
						</form>
					</div>
					<!-- What We Do Section End -->
					<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						<form method="post" action="{{route('addPageSectionContent')}}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								
								<div class="col-md-6 mb-1">
									<label for="title1">Title:</label>
									<input type="text" class="form-control" value="{{$homes[2]->title}}" name="title" id="title1" placeholder="Title">
								</div>
								
								<div class="col-md-6 mb-1">
									<label for="subtitle1">Subtitle:</label>
									<input type="text" class="form-control" value="{{$homes[2]->subtitle}}" name="subtitle" id="subtitle1" placeholder="Subtitle">
								</div>
								
								<div class="col-md-6 mb-1">
									  <label for="bg_img1">Background Image:</label>
									  <input type="file" class="form-control-file" id="bg_img1" name="bg_img">
								</div>
								
								<div class="col-md-6 mb-1">
									@if($homes[2]->bg_img)
									  <img src="{{$homes[2]->bg_img}}" width="100" height="70" style="border: 1px solid #000;"></img>
									@endif
								</div>
								
								<div class="col-md-6 mb-1">
									  <label for="side_img1">Side Image</label>
									  <input type="file" class="form-control-file" id="side_img1" name="side_img">
								</div>
								
								<div class="col-md-6 mb-1">
									@if($homes[2]->side_img)
									  <img src="{{$homes[2]->side_img}}" width="100" height="70" style="border: 1px solid #000;"></img>
									@endif
								</div>
								
							</div>
							<div class="full-wrapper">
									<textarea class="chooseus_editor" id="chooseus_editor" name="section_content"></textarea>
							</div>
							
							<div>
								<input type="hidden" value="home" name="page">
								<input type="hidden" value="3" name="section_id"></input>
								<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
							</div>
						</form>
					</div>
					
					
						<!-- Faunder Note Start -->
					<div class="tab-pane fade" id="v-pills-founder" role="tabpanel" aria-labelledby="v-pills-founder-tab">
						<form method="post" action="{{route('addPageSectionContent')}}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								
								<div class="col-md-6 mb-1">
									<label for="title1">Title:</label>
									<input type="text" class="form-control" value="{{$homes[3]->title}}" name="title" id="title1" placeholder="Title">
								</div>
								
								<div class="col-md-6 mb-1">
									<label for="subtitle1">Subtitle:</label>
									<input type="text" class="form-control" value="{{$homes[3]->subtitle}}" name="subtitle" id="subtitle1" placeholder="Subtitle">
								</div>
								
								<div class="col-md-6 mb-1">
									  <label for="bg_img1">Background Image:</label>
									  <input type="file" class="form-control-file" id="bg_img1" name="bg_img">
								</div>
								
								<div class="col-md-6 mb-1">
									@if($homes[3]->bg_img)
									  <img src="{{$homes[3]->bg_img}}" width="100" height="70" style="border: 1px solid #000;"></img>
									@endif
								</div>
								
								<div class="col-md-6 mb-1">
									  <label for="side_img1">Side Image</label>
									  <input type="file" class="form-control-file" id="side_img1" name="side_img">
								</div>
								
								<div class="col-md-6 mb-1">
									@if($homes[3]->side_img)
									  <img src="{{$homes[3]->side_img}}" width="100" height="70" style="border: 1px solid #000;"></img>
									@endif
								</div>
								
							</div>
							<div class="full-wrapper">
									<textarea class="founder_editor" id="founder_editor" name="section_content">{{$homes[3]->content}}</textarea>
							</div>
							
							
							<div>
								<input type="hidden" value="home" name="page">
								<input type="hidden" value="4" name="section_id"></input>
								<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
							</div>
						</form>
					</div>
					
					
					<!-- Faunder Note End -->
					
					
					<!-- Fearures Start -->
					<div class="tab-pane fade" id="v-pills-fearures" role="tabpanel" aria-labelledby="v-pills-fearures-tab">
						<form method="post" action="{{route('addPageSectionContent')}}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								
								<div class="col-md-6 mb-1">
									<label for="title1">Title:</label>
									<input type="text" class="form-control" value="{{$homes[4]->title}}" name="title" id="title1" placeholder="Title">
								</div>
								
								<div class="col-md-6 mb-1">
									<label for="subtitle1">Subtitle:</label>
									<input type="text" class="form-control" value="{{$homes[4]->subtitle}}" name="subtitle" id="subtitle1" placeholder="Subtitle">
								</div>
								
								<div class="col-md-6 mb-1">
									  <label for="bg_img1">Background Image:</label>
									  <input type="file" class="form-control-file" id="bg_img1" name="bg_img">
								</div>
								
								<div class="col-md-6 mb-1">
									@if($homes[4]->bg_img)
									  <img src="{{$homes[4]->bg_img}}" width="100" height="70" style="border: 1px solid #000;"></img>
									@endif
								</div>
								
								<div class="col-md-6 mb-1">
									  <label for="side_img1">Side Image</label>
									  <input type="file" class="form-control-file" id="side_img1" name="side_img">
								</div>
								
								<div class="col-md-6 mb-1">
									@if($homes[4]->side_img)
									  <img src="{{$homes[4]->side_img}}" width="100" height="70" style="border: 1px solid #000;"></img>
									@endif
								</div>
								
							</div>
							<div class="full-wrapper">
									<textarea class="feature_editor" id="feature_editor" name="section_content"></textarea>
							</div>
							
							
							<div>
								<input type="hidden" value="home" name="page">
								<input type="hidden" value="5" name="section_id"></input>
								<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
							</div>
						</form>
					</div>
					
					
					<!-- Fearures End -->
					
					
					
					
				</div>
			  </div>
			</div>
        </div>
		
      </div>
    </div>
  </div>
</section>
<!-- Basic Inputs end -->

@endsection


{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/editors/quill/katex.min.js')}}"></script>
<script src="{{asset('vendors/js/editors/quill/highlight.min.js')}}"></script>
<script src="{{asset('vendors/js/editors/quill/quill.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/form-tooltip-valid.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>

<script>
function saveData(id){
	var myEditor = document.querySelector('#full-container'+id+' .editor');
	var html = myEditor.children[0].innerHTML;
	var _token = $('input[name=_token]').val();
	// var id = $(e).data('id');
	console.log(html);
	// alert(id);
	
	$('#section'+id).val(html);
	return true;
}

CKEDITOR.replace('quill_editor1');
CKEDITOR.replace('quill_editor2');
CKEDITOR.replace('quill_editor3');
CKEDITOR.replace('banner_editor');
CKEDITOR.replace('chooseus_editor');
CKEDITOR.replace('founder_editor');
CKEDITOR.replace('feature_editor');

</script>

@endsection



