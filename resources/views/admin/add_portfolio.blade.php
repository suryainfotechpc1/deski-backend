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
          <h4 class="card-title">Add Portfolio</h4>
        </div>
        <div class="card-body">
			<div class="row">
			
	<div class="col-9">
	   <div class="tab-content" id="v-pills-tabContent">
		  
		<!-- Section 1 Start -->
		
		
		   <form method="post" action="{{route('addPortfolio')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
			    <div class="col-md-6 mb-1">
				<label for="title1">Title:</label>
				<input type="text" class="form-control" value="{{($servicesedit[0]->title ?? '')}}" name="title" id="title1" placeholder="Title">
			    </div>
								
			    <div class="col-md-6 mb-1">
				<label for="subtitle1">Category:</label>
				<select class="form-control" value="" name="category_id" id="subtitle1" placeholder="category">
				@foreach($catde as $cat)
					<option value="{{$cat->id}}">{{$cat->category}}</option>
				 @endforeach
				</select>
			    </div>
								
								
			    <div class="col-md-6 mb-1">
				<label for="side_img1">Side Image</label>
				<input type="file" class="form-control-file" id="side_img1" name="side_img">
			    </div>
								
			    <div class="col-md-6 mb-1">
				
				<img src="{{($servicesedit[0]->img ?? '')}}" width="100" height="70" style="border: 1px solid #000;"></img>
				
			    </div>
								
			</div>
			<div id="full-wrapper">
				<textarea class="quill_editor3" name="section_content">{{($servicesedit[0]->content ?? '')}}</textarea>
			</div>
		
			<div>
				<input type="hidden" id="edit_id" name="id" value="{{($servicesedit[0]->id ?? '')}}" >
				<input type="hidden" id="edit_id" name="type" value="portfolios" >
				<button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right;">Add Portfolio</button>
			</div>
		</form>
		
	
		<!-- Section 1 End -->
		
		
		
		
		
					
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



