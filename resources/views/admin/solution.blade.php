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
          <h4 class="card-title">Solution</h4>
        </div>
        <div class="card-body">
			<div class="row">
			  <div class="col-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				  <a class="nav-link active" id="v-pills-section1-tab" data-toggle="pill" href="#v-pills-section1" role="tab" aria-controls="v-pills-section1" aria-selected="true">Section 1</a>
				  <a class="nav-link" id="v-pills-section2-tab" data-toggle="pill" href="#v-pills-section2" role="tab" aria-controls="v-pills-section2" aria-selected="false">Section 2</a>
				  <a class="nav-link" id="v-pills-section3-tab" data-toggle="pill" href="#v-pills-section3" role="tab" aria-controls="v-pills-section3" aria-selected="false">Section 3</a>
			
				
				   
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
				<input type="text" class="form-control" value="{{$solution[0]->title}}" name="title" id="title1" placeholder="Title">
			    </div>
								
			    <div class="col-md-6 mb-1">
				<label for="subtitle1">Subtitle:</label>
				<input type="text" class="form-control" value="{{$solution[0]->subtitle}}" name="subtitle" id="subtitle1" placeholder="Subtitle">
			    </div>
			    
			    <div id="full-wrapper">
				<textarea class="quill_editor1" name="content[]"></textarea>
			</div>
								
			  
								
			</div>

			<div>
				<input type="hidden" value="solution" name="page">
				<input type="hidden" value="1" name="section_id"></input>
				<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
			</div>
		</form>
		
	</div>
		<!-- Section 1 End -->
		
		
		
		
		
					
	<!-- Section 2 Start -->
		<div class="tab-pane fade" id="v-pills-section2" role="tabpanel" aria-labelledby="v-pills-section2-tab">
		
		   <form method="post" action="{{route('saveServices')}}" enctype="multipart/form-data">
		   
		   
		   @csrf
							<div class="row mb-2" style="border: 1px solid lightgray;">
								<div class="col-md-12 mb-1">
									  <label for="side_img1">Section Title</label>
									  <input type="text" class="form-control" name="title" value="{{$solution[1]->title}}" />
								</div>
							</div>
							
							<div class="row mb-2" style="border: 1px solid lightgray;">
								<div class="col-md-12 mb-1">
									 <label for="subtitle1">Subtitle:</label>
				<input type="text" class="form-control" value="{{$solution[1]->subtitle}}" name="subtitle" id="subtitle1" placeholder="Subtitle">
								</div>
							</div>
							 @php 
								$arr = json_decode($solution[1]->content);
								
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
										<textarea class="quill_editor2" name="content[]">{{$arr[0]->content}}</textarea>
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
										<textarea class="quill_editor3" name="content[]">{{$arr[1]->content}}</textarea>
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
										<textarea class="quill_editor4" name="content[]">{{$arr[2]->content}}</textarea>
									</div>
								</div>
							</div>
							
							
							<div>
								<input type="hidden" value="solution" name="page">
								<input type="hidden" value="2" name="section_id">
								<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
							</div>
		   
		   
		</form>
		
	</div>
		<!-- Section 2 End -->		
		
		
		
		
		
		<!-- Section 3 Start -->
		<div class="tab-pane fade" id="v-pills-section3" role="tabpanel" aria-labelledby="v-pills-section3-tab">
		
		   <form method="post" action="{{route('saveServices')}}" enctype="multipart/form-data">
		   
		   
		   @csrf
							<div class="row mb-2" style="border: 1px solid lightgray;">
								<div class="col-md-12 mb-1">
									  <label for="side_img1">Section Title</label>
									  <input type="text" class="form-control" name="title" value="{{$solution[2]->title}}" />
								</div>
							</div>
							
							<div class="row mb-2" style="border: 1px solid lightgray;">
								<div class="col-md-12 mb-1">
									 <label for="subtitle1">Subtitle:</label>
				<input type="text" class="form-control" value="{{$solution[2]->subtitle}}" name="subtitle" id="subtitle1" placeholder="Subtitle">
								</div>
							</div>
							 
							
							<div class="row mb-2 py-2 box" style="border: 1px solid lightgray;">
								<h5 class="pl-1">Box 1</h5>
								<div class="col-md-12 mb-2">
									<label for="side_img1">Title :</label>
									<input type="text" class="form-control" name="box_title[]" value="{{$arr[0]->title}}" />
								</div>
								<div class="col-md-12">
									<label for="side_img1">Content :</label>
									<div class="full-wrapper">
										<textarea class="quill_editor5" name="content[]">{{$arr[0]->content}}</textarea>
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
										<textarea class="quill_editor6" name="content[]">{{$arr[1]->content}}</textarea>
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
										<textarea class="quill_editor7" name="content[]">{{$arr[2]->content}}</textarea>
									</div>
								</div>
							</div>
							
							
							<div>
								<input type="hidden" value="solution" name="page">

								<input type="hidden" value="3" name="section_id">
								<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Save</button>
							</div>
		   
		   
		</form>
		
	</div>
		<!-- Section 3 End -->		
		
		
		
		
		
		
					
					
				
					
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
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

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

  
  ClassicEditor.create(document.querySelector( '.quill_editor1'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    }).catch( error => {
        console.log( error );
    });
	
	ClassicEditor.create(document.querySelector( '.quill_editor2'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    }).catch( error => {
        console.log( error );
    });
	
	ClassicEditor.create(document.querySelector( '.quill_editor3'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    }).catch( error => {
        console.log( error );
    });
	
	ClassicEditor.create(document.querySelector( '.quill_editor4'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    }).catch( error => {
        console.log( error );
    });
    
    	ClassicEditor.create(document.querySelector( '.quill_editor5'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],

        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    }).catch( error => {
        console.log( error );
    });
    
    ClassicEditor.create(document.querySelector( '.quill_editor6'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],

        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    }).catch( error => {

        console.log( error );
    });
    
    ClassicEditor.create(document.querySelector( '.quill_editor7'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],

        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    }).catch( error => {

        console.log( error );
    });
    
    ClassicEditor.create(document.querySelector( '.quill_editor8'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],

        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    }).catch( error => {

        console.log( error );
    });
</script>

@endsection



