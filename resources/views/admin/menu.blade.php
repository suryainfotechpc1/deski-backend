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
          <h4 class="card-title">Menu</h4>
			
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
			
		<form method="post" action="{{route('addMenu')}}">
			@csrf
          <div class="row">
				<div class="col-md-6">
					<label for="addMenu">Add Menu</label>
					<input type="text" class="form-control" id="addMenu" name="menu" placeholder="Add Menu" value="" >
					<input type="hidden" id="edit_id" name="id" value="" >
				</div>
				<div class="col-md-6">
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
				<!--<div class="card-header">
				  <h4 class="card-title">Zero configuration</h4>
				</div>-->
				<div class="card-body card-dashboard">
				  <!--<p class="card-text">
					DataTables has most features enabled by default, so all you need
					to do to use it with your own tables is to call the construction
					function: $().DataTable();.
				  </p>-->
				  
				  <?php //print_r($menu);?>
				  
				  <div class="table-responsive">
					<table id="datatable1" class="table zero-configuration">
					  <thead>
						<tr>
						  <th>id</th>
						  <th>Name</th>
						  <th>Action</th> 
						</tr>
					  </thead>
					  <tbody>
					  @foreach($menu as $menus)
						<tr>
						  <td>{{$menus->id}}</td>
						  <td>{{$menus->name}}</td>
						  <td>
						  <a href="javascript:void" data-id="{{$menus->id}}" data-name="{{$menus->name}}" class="btn edit_btn"><i class="fa fa-pencil" style="color:blue;"></i></a>
						  <a href="{{route('deleteMenu',['id' => $menus->id])}}" data-id="{{$menus->id}}"class="btn delete_btn"><i class="fa fa-trash" style="color:red;"></i></a>
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
		<!--/ Zero configuration table -->
		
      </div>
    </div>
  </div>
</section>
<!-- Basic Inputs end -->


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


// $('#datatable1').on('click','.delete_btn', function(){
	// alert("clicked");
// });

// function delete(){
	// alert("inline");
// }
</script>
@endsection

