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
          <h4 class="card-title">Contact</h4>
        </div>
        <div class="card-body">
			<div class="row">
			  <div class="col-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				  <a class="nav-link active" id="v-pills-location-tab" data-toggle="pill" href="#v-pills-location" role="tab" aria-controls="v-pills-location" aria-selected="true">Location</a>
				  <a class="nav-link" id="v-pills-contact-tab" data-toggle="pill" href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false">Contact</a>
				  <a class="nav-link" id="v-pills-social-tab" data-toggle="pill" href="#v-pills-social" role="tab" aria-controls="v-pills-social" aria-selected="false">Social</a>
				</div>
			  </div>
			  <div class="col-9">
				<div class="tab-content" id="v-pills-tabContent">
				  <div class="tab-pane fade show active" id="v-pills-location" role="tabpanel" aria-labelledby="v-pills-location-tab">
					
					<form method="post" action="{{route('addSectionContent')}}" enctype="multipart/form-data">
					
					@csrf
					<div id="full-wrapper">
						<div id="full-container1">
							<div class="editor" name="texteditor">
							
								<?php if(count($contactpagedetails) > 0){ echo $contactpagedetails[0]->content; }else{ '';} ?>
								
							</div>
						</div>
					</div>
					
					<div>
						<input type="hidden" value="" id="section1" name="section_content"></input>
						<input type="hidden" value="1" name="id"></input>
						<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;" onclick="return saveData(1);">Save</button>
					</div>
					
					</form>

						  
					
		  
				  </div>
				  <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
					
					<form method="post" action="{{route('addSectionContent')}}" enctype="multipart/form-data">
					
					@csrf
					
					<div id="full-wrapper">
						<div id="full-container2">
							<div class="editor" name="texteditor">
								
								<?php if(count($contactpagedetails) > 1){ echo $contactpagedetails[1]->content; }else{ '';} ?>
							</div>
						</div>
					</div>
					
					<div>
						<input type="hidden" value="" id="section2" name="section_content"></input>
						<input type="hidden" value="2" name="id"></input>
						<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;" onclick="return saveData(2);">Save</button>
					</div>
					
					</form>
					
				  </div>
				  <div class="tab-pane fade" id="v-pills-social" role="tabpanel" aria-labelledby="v-pills-social-tab">
					<form method="post" action="{{route('addSectionContent')}}" enctype="multipart/form-data">
					
					@csrf
					<div id="full-wrapper">
						<div id="full-container3">
							<div class="editor" name="texteditor">
								
								<?php if(count($contactpagedetails) > 2){ echo $contactpagedetails[2]->content; }else{ '';} ?>
							</div>
						</div>
					</div>
					
					<div>
						<input type="hidden" value="" id="section3" name="section_content"></input>
						<input type="hidden" value="3" name="id"></input>
						<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;" onclick="return saveData(3);">Save</button>
					</div>
					</form>
					
				  </div>
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
<!--<script src="{{asset('js/scripts/forms/form-tooltip-valid.js')}}"></script>-->
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
		// alert(id);
		console.log(html);
		$('#section'+id).val(html);
		
		// $.ajax({
		  // type: "POST",
		  // url: "{{route('addSliderImage')}}",
		  // data: {data1 : html, _token : _token},
		  // dataType: "html",
		  // success: function(response){
			  // alert(response);
		  // }
		// });
		return true;
   }

   
   	var fullEditor2 = new Quill('#full-container2 .editor', {
    bounds: '#full-container2 .editor',
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
  
  	var fullEditor3 = new Quill('#full-container3 .editor', {
    bounds: '#full-container3 .editor',
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
  
</script>
@endsection



