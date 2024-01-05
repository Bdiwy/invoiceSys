@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">SETTINGS</h4><a class="text-muted mt-1 tx-13 mr-2 mb-0" href="/add-sections">/ Add Sections</a>
                            <a class="text-muted mt-1 tx-13 mr-2 mb-0">/ Update Sections</a>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')






<div class="row row-sm">

    <div class="col-xl-12">

        <div class="card">






            <div class="card-header pb-0">




                <h6 class="modal-title">Update-Section</h6>
            
            <div class="modal-body">


                <form action='/update/{{$id}}' method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="">
                        <label for="recipient-name" class="col-form-label">Section-name :</label>
                        <input class="form-control" name="section_name" value="{{$section_name}}" id="section_name" type="text">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Notes :</label>
                        <textarea class="form-control" id="description" name="description" >{{$description}}</textarea>
                    </div>
                    <button class="btn ripple btn-success" type="submit">Update</button>
                    <a class="btn ripple btn-secondary" href="/add-sections">Back</a>
                </div>
                    </div>
                    <input type="hidden" value="{{ $id }}" name="id">
                    <input type="hidden" value="{{ $Created_by }}" name="Created_by">
                
            </form>
    
        </div>
            </div>
        </div>
        </div>

    </div>

</div>
				<!-- row -->
				<div class="row">

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection