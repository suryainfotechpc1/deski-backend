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
          <h4 class="card-title">About</h4>
        </div>
        <div class="card-body">
			<div class="row">
			  <div class="col-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				  <a class="nav-link active" id="v-pills-section1-tab" data-toggle="pill" href="#v-pills-section1" role="tab" aria-controls="v-pills-section1" aria-selected="true">About us</a>
				  <a class="nav-link" id="v-pills-section2-tab" data-toggle="pill" href="#v-pills-section2" role="tab" aria-controls="v-pills-section2" aria-selected="false">OUR STORY</a>
				  <a class="nav-link" id="v-pills-section3-tab" data-toggle="pill" href="#v-pills-section3" role="tab" aria-controls="v-pills-section3" aria-selected="false">Founder</a>
				  <a class="nav-link" id="v-pills-section4-tab" data-toggle="pill" href="#v-pills-section4" role="tab" aria-controls="v-pills-section4" aria-selected="false">OUR VALUES</a>
				  <a class="nav-link" id="v-pills-section5-tab" data-toggle="pill" href="#v-pills-section5" role="tab" aria-controls="v-pills-section5" aria-selected="false">OUR TEAM</a>
				   
				</div>
			  </div>
	<div class="col-9">
	   <div class="tab-content" id="v-pills-tabContent">
		  
		<!-- Section 1 Start -->
		
		<div class="tab-pane fade show active" id="v-pills-section1" role="tabpanel" aria-labelledby="v-pills-section1-tab">
		   <form method="post" action="{{route('addPageSectionContent')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
			    <div class="col-md-6 mb-1">
				<label for="title1">Title:</label>
				<input type="text" class="form-control" value="{{$about[0]->title}}" name="title" id="title1" placeholder="Title">
			    </div>
								
			    <div class="col-md-6 mb-1">
				<label for="subtitle1">Subtitle:</label>
				<input type="text" class="form-control" value="{{$about[0]->subtitle}}" name="subtitle" id="subtitle1" placeholder="Subtitle">
			    </div>
					
			</div>
		
			<div>
				<input type="hidden" value="about" name="page">
				<input type="hidden" value="1" name="section_id"></input>
				<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
			</div>
		</form>
		
	</div>
		<!-- Section 1 End -->
		
		
		
		
		
		<!-- Section 2 Start -->
		<div class="tab-pane fade" id="v-pills-section2" role="tabpanel" aria-labelledby="v-pills-section2-tab">
		
		   <form method="post" action="{{route('addPageSectionContent')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
			    <div class="col-md-6 mb-1">
				<label for="title1">Title:</label>
				<input type="text" class="form-control" value="{{$about[1]->title}}" name="title" id="title1" placeholder="Title">
			    </div>
								
			    <div class="col-md-6 mb-1">
				<label for="subtitle1">Subtitle:</label>
				<input type="text" class="form-control" value="{{$about[1]->subtitle}}" name="subtitle" id="subtitle1" placeholder="Subtitle">
			    </div>
								
			    <div class="col-md-6 mb-1">
				<label for="bg_img1">Background Image:</label>
				<input type="file" class="form-control-file" id="bg_img1" name="bg_img">
			    </div>
								
			    <div class="col-md-6 mb-1">
				@if($about[1]->bg_img)
				 <img src="{{$about[1]->bg_img}}" width="100" height="70" style="border: 1px solid #000;"></img>
				@endif
			    </div>
								
			    <div class="col-md-6 mb-1">
				<label for="side_img1">Side Image</label>
				<input type="file" class="form-control-file" id="side_img1" name="side_img">
			    </div>
								
			    <div class="col-md-6 mb-1">
				@if($about[1]->side_img)
				<img src="{{$about[1]->side_img}}" width="100" height="70" style="border: 1px solid #000;"></img>
				@endif
			    </div>
								
			</div>
			<div id="full-wrapper">
				<textarea class="quill_editor1" id="quill_editor1" name="content[]">{{$about[1]->content}}</textarea>
			</div>
		
			<div>
				<input type="hidden" value="about" name="page">
				<input type="hidden" value="2" name="section_id"></input>
				<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
			</div>
		</form>
	</div>
		<!-- Section 2 End -->
		
		
		<!-- Section 3 Start -->
		<div class="tab-pane fade" id="v-pills-section3" role="tabpanel" aria-labelledby="v-pills-section3-tab">
		
		   <form method="post" action="{{route('saveAboutFounder')}}" enctype="multipart/form-data">
			@csrf
			@php
				$founder_images = json_decode($about[2]->side_img);
			@endphp
			<div class="row">
			    <div class="col-md-6 mb-1">
					<label for="side_img1">Founder Profile Imag 1:</label>
					<input type="file" class="form-control-file" id="side_img1" name="side_img[]">
			    </div>
			    <div class="col-md-6 mb-1">
					@if($founder_images[0])
						<img src="{{$founder_images[0]}}" width="100" height="70" style="border: 1px solid #000;"></img>
					@endif
			    </div>
			</div>
			
			<div class="row">
			    <div class="col-md-6 mb-1">
					<label for="side_img1">Founder Profile Imag 2:</label>
					<input type="file" class="form-control-file" id="side_img1" name="side_img[]">
			    </div>
			    <div class="col-md-6 mb-1">
					@if($founder_images[1])
						<img src="{{$founder_images[1]}}" width="100" height="70" style="border: 1px solid #000;"></img>
					@endif
			    </div>
			</div>
			
			<div class="row">
			    <div class="col-md-6 mb-1">
					<label for="side_img1">Founder Profile Imag 3:</label>
					<input type="file" class="form-control-file" id="side_img1" name="side_img[]">
			    </div>
			    <div class="col-md-6 mb-1">
					@if($founder_images[2])
						<img src="{{$founder_images[2]}}" width="100" height="70" style="border: 1px solid #000;"></img>
					@endif
			    </div>
			</div>
			
			<div class="row">
			    <div class="col-md-6 mb-1">
					<label for="side_img1">Founder Profile Imag 4:</label>
					<input type="file" class="form-control-file" id="side_img1" name="side_img[]">
			    </div>
			    <div class="col-md-6 mb-1">
					@if($founder_images[3])
						<img src="{{$founder_images[3]}}" width="100" height="70" style="border: 1px solid #000;"></img>
					@endif
			    </div>
			</div>
			
			<div id="full-wrapper">
				<textarea id="founder_editor" name="content">{{$about[2]->content}}</textarea>
			</div>
			
			<div>
				<input type="hidden" value="about" name="page">
				<input type="hidden" value="3" name="section_id"></input>
				<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
			</div>
		</form>
	</div>
	<!-- Section 3 End -->	
	<!-- Section 4 Start -->
		<div class="tab-pane fade" id="v-pills-section4" role="tabpanel" aria-labelledby="v-pills-section4-tab">
		
		   <form method="post" action="{{route('addPageSectionContent')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
			    <div class="col-md-6 mb-1">
					<label for="title1">Title:</label>
					<input type="text" class="form-control" value="{{$about[0]->title}}" name="title" id="title1" placeholder="Title">
			    </div>
			    <div class="col-md-6 mb-1">
					<label for="subtitle1">Subtitle:</label>
					<input type="text" class="form-control" value="{{$about[0]->subtitle}}" name="subtitle" id="subtitle1" placeholder="Subtitle">
			    </div>
			</div>
			<div id="full-wrapper">
				<textarea class="quill_editor2" id="quill_editor2" name="content[]">{{$about[0]->content}}</textarea>
			</div>
		
			<div>
				<input type="hidden" value="about" name="page">
				<input type="hidden" value="4" name="section_id"></input>
				<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
			</div>
		</form>
	</div>
		<!-- Section 4 End -->
					
					
	<!-- Section 5 Start -->
		<div class="tab-pane fade" id="v-pills-section5" role="tabpanel" aria-labelledby="v-pills-section5-tab">
		
		   <form method="post" action="{{route('addPageSectionContent')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
			    <div class="col-md-6 mb-1">
				<label for="title1">Title:</label>
				<input type="text" class="form-control" value="{{$about[0]->title}}" name="title" id="title1" placeholder="Title">
			    </div>
								
			    <div class="col-md-6 mb-1">
				<label for="subtitle1">Subtitle:</label>
				<input type="text" class="form-control" value="{{$about[0]->subtitle}}" name="subtitle" id="subtitle1" placeholder="Subtitle">
			    </div>
								
								
			    <div class="col-md-6 mb-1">
				<label for="side_img1">Side Image</label>
				<input type="file" class="form-control-file" id="side_img1" name="side_img">
			    </div>
								
			    <div class="col-md-6 mb-1">
				@if($about[0]->side_img)
				<img src="{{$about[0]->side_img}}" width="100" height="70" style="border: 1px solid #000;"></img>
				@endif
			    </div>
								
			</div>
			<div id="full-wrapper">
				<textarea class="quill_editor3" id="quill_editor3" name="content[]">{{$about[0]->content}}</textarea>
			</div>
		
			<div>
				<input type="hidden" value="about" name="page">
				<input type="hidden" value="5" name="section_id"></input>
				<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
			</div>
		</form>
	</div>
		<!-- Section 5 End -->				
					
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
	var fullEditor1 = new Quill('#full-container1 .editor', {
    bounds: '#full-container1 .editor',
    modules: {
      'formula': true,
      'syntax': true,
      'toolbar': [
        [{
          'font': []
        }, {
          'size': []
        }],
        ['bold', 'italic', 'underline', 'strike'],
        [{
          'color': []
        }, {
          'background': []
        }],
        [{
          'script': 'super'
        }, {
          'script': 'sub'
        }],
        [{
          'header': '1'
        }, {
          'header': '2'
        }, 'blockquote', 'code-block'],
        [{
          'list': 'ordered'
        }, {
          'list': 'bullet'
        }, {
          'indent': '-1'
        }, {
          'indent': '+1'
        }],
        ['direction', {
          'align': []
        }],
        ['link', 'image', 'video', 'formula'],
        ['clean']
      ],
    },
    theme: 'snow'
  });
  
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
	CKEDITOR.replace('founder_editor');
</script>

@endsection



