@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Input')

@section('content')
<!-- Basic Inputs start -->
<section id="basic-input">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Slider</h4>
			
        </div>
        <div class="card-body">
			
		<form method="post" action="{{route('addSliderImage')}}">
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
        </div>
		
      </div>
    </div>
  </div>
</section>
<!-- Basic Inputs end -->


@endsection


{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/form-tooltip-valid.js')}}"></script>
@endsection

