@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Input')
@section('title','Datatables')

@section('vendor-styles')
<link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<!-- Basic Inputs start -->
<section id="basic-input">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Category</h4>
			
        </div>
        <div class="card-body">
		@if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
		
		@if (session('failed'))
			<div class="alert alert-danger">
				{{ session('failed') }}
			</div>
		@endif
		
		@if (session('update'))
			<div class="alert alert-success">
				{{ session('update') }}
			</div>
		@endif
			
		<form method="post" action="{{route('addCategory')}}">
			@csrf
          <div class="row">
				<div class="col-md-4 mb-1">
					<label for="addMenu">Add Category</label>
					<input type="text" class="form-control" id="addMenu" name="menu" placeholder="Add Catrgory" value="" >
					<input type="hidden" id="edit_id" name="id" value="" >
					
					
				</div>
				<div class="col-md-4 mb-1">
					<label for="slect">Select Type</label>
					<select name="type" class="form-control" value="" placeholder="" id="slect">
					<option value="portfolios">Portfolio</option>
					<option value="blog">Blog</option>
					</select>
					
				</div>
				<div class="col-md-4 mb-1">
					<button class="btn btn-primary" type="submit" style="position:absolute; bottom: 0;">Submit</button>
				</div>
          </div>
		  
		  </form>
        </div>
		
		<!-- Zero configuration table -->
		<section id="basic-datatable">
		  <div class="row">
			<div class="col-12">
			  <div class="card">
				
				<div class="card-body card-dashboard">
				
				  
				  <div class="table-responsive">
					<table id="datatable1" class="table zero-configuration">
					  <thead>
						<tr>
						  <th>id</th>
						  <th>Name</th>
						   <th>Category Type</th>
						  <th>Action</th> 
						</tr>
					  </thead>
					  <tbody>
					  @foreach($category as $categorys)
						<tr>
						  <td>{{$categorys->id}}</td>
						  <td>{{$categorys->category}}</td>
						  <td>{{$categorys->type}}</td>
						  <td>
						  <a href="javascript:void" data-id="{{$categorys->id}}" data-name="{{$categorys->category}}" class="btn edit_btn"><i class="fa fa-pencil" style="color:blue;"></i></a>
						  <a href="{{route('deleteCategory',['id' => $categorys->id])}}" data-id="{{$categorys->id}}"class="btn delete_btn"><i class="fa fa-trash" style="color:red;"></i></a>
						  </td>
						</tr>
					 @endforeach
					  </tbody>
					</table>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</section>
	
		
      </div>
    </div>
  </div>
</section>



@endsection


{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
@endsection




{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/form-tooltip-valid.js')}}"></script>
<script src="{{asset('js/scripts/datatables/datatable.js')}}"></script>
<script>
// $(document).ready(function () {
    // $('#datatable1').DataTable();
// });

$('#datatable1').on('click','.edit_btn', function(){
	var id = $(this).data('id');
	var name = $(this).data('name');
	$('#edit_id').val(id);
	$('#addMenu').val(name);
});


</script>
@endsection

