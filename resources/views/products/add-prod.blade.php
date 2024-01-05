@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">SETTINGS</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add
				Sections</span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

@if (session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('Add') }}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<p>
		{{ session('message') }}
	</p>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('delete') }}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('edit') }}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

<!-- row -->
<div class="row">

	<div class="col-xl-12">
		<div class="card">
			<div class="card-header pb-0">

				<div class="col-sm-6 col-md-4 col-xl-2 mg-t-20">
					<a class="modal-effect btn btn-primary btn-block" data-effect="effect-flip-vertical"
						data-toggle="modal" href="#modaldemo8">Add-Product</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-md-nowrap" id="example1" data-page-length="50">
						<thead>
							<tr>
								<th>#</th>
								<th>Product name</th>
								<th>Product section</th>
								<th>Notes</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $i=0 ?>
							@foreach ($products as $item)
							<?php $i++ ?>

							<tr>
								<th>{{$i}}</th>
								<td>{{$item->product_name}}</td>
								<td>{{$item->section->section_name}}</td>
								<td>{{$item->description}}</td>
								<td>
									<button class=" modal-effect btn btn-success" data-id="{{$item->id}}"
										data-name="{{$item->product_name}}"
										data-section_name="{{$item->section->section_name}}"
										data-description="{{$item->description}}" data-toggle="modal"
										data-target="#edit_product">Update</button>
									<button class="btn btn-danger" data-id="{{$item->id}}"
										data-name="{{$item->product_name}}" data-toggle="modal"
										data-target="#delete_product">Delete</button>
								</td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div><!-- bd -->
			</div><!-- bd -->
		</div><!-- bd -->
	</div>
	<!--/div-->

	<div class="modal" id="modaldemo8">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">Add-Product</h6><button aria-label="Close" class="close"
						data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">

					<form action={{route('add-product.store')}} method="post" autocomplete="off">

						@csrf
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Product-name:
							</label>
							<input class="form-control" name="product_name" id="product_name" type="text">
						</div>

						<div class="form-group">
							<label for="message-text" class="col-form-label">Section :</label>
							<select class="form-control" name="section_id" id="section_id" required>
								<option value="" selected disabled>-- chose the section --</option>
								@foreach ($sections as $item)
								<option value="{{$item->id}}">{{$item->section_name}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="message-text" class="col-form-label">Notes :</label>
							<textarea class="form-control" id="description" name="description"></textarea>
						</div>

						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Add</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
				</div>

				</form>
			</div>

		</div>
	</div>

	{{-- model for edit --}}
	<div class="modal fade" id="edit_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLabel">Update-Product</h6>
					<button aria-label="Close" class="close" data-dismiss="modal" type="button">
						<span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">

					<form action={{route('update')}} method="post" autocomplete="off">

						@csrf
						<input name="id" id="id" value="" type="hidden">

						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Product-name:
							</label>
							<input class="form-control" name="product_name" id="product_name" type="text">
						</div>

						<div class="form-group">
							<label for="message-text" class="col-form-label" for="inlineformcustomSelectpref">Section
								:</label>

							<select name="section_name" id="section_name" class="custom-select my-1 mr-sm-2" required>
								@foreach ($sections as $item)
								<option>{{$item->section_name}}</option>
								@endforeach

							</select>

						</div>

						<div class="form-group">
							<label for="message-text" class="col-form-label">Notes :</label>
							<textarea class="form-control" id="description" name="description"></textarea>
						</div>

						<div class="modal-footer">
							<button class="btn ripple btn-success" type="submit">Update</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
				</div>

				</form>
			</div>

		</div>
	</div>

	{{-- model for delete --}}
	<div class="modal fade" id="delete_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLabel">Delete-Product</h6>
					<button aria-label="Close" class="close" data-dismiss="modal" type="button">
						<span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">

					<form action={{route('delete')}} method="post" autocomplete="off">

						@csrf
						<input name="id" id="id" value="" type="hidden">

						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Product-name:
							</label>
							<input class="form-control" name="product_name" id="product_name" type="text">
						</div>

						<div class="modal-footer">
							<button class="btn btn-danger" type="submit">Delete</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
				</div>

				</form>
			</div>

		</div>
	</div>

</div>

<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script>
	$('#edit_product').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var product_name = button.data('name')
		var section_name = button.data('section_name')
		var description = button.data('description')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #product_name').val(product_name);
		modal.find('.modal-body #section_name').val(section_name);
		modal.find('.modal-body #description').val(description);
	})
	$('#delete_product').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var product_name = button.data('name')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #product_name').val(product_name);
	})
</script>

@endsection