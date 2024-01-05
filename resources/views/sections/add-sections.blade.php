@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
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

        {{-- الجنب الشمال فوق --}}
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')





    <!-- row -->














    <div class="row">

    @section('content')
        <!-- row opened -->




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





        


        <div class="row row-sm">

            <div class="col-xl-12">

                <div class="card">






                    <div class="card-header pb-0">


                        <div class="col-sm-6 col-md-4 col-xl-2 mg-t-20">
                            <a class="modal-effect btn btn-primary btn-block" data-effect="effect-flip-vertical"
                                data-toggle="modal" href="#modaldemo8">Add-Sections</a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example3">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">#</th>
                                        <th class="wd-15p border-bottom-0">Section Name</th>
                                        <th class="wd-15p border-bottom-0">Description</th>
                                        <th class="wd-20p border-bottom-0">Created By</th>

                                    </tr>
                                </thead>
                                <?php $i=0 ;?>                                
                                @foreach ($data as $data)
                                <?php $i++ ;?>                                
                                    <tbody>
                                        <tr>

                                            <td>{{ $i }}</td>
                                            <td>{{ $data->section_name }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>{{ $data->Created_by }}</td>
                                            <td>
                                            <form action="/update-sec" method="POST">
                                                @csrf
                                            <a class="btn btn-danger"href="/destroy/{{ $data->id }}">Delete</a>
                                                <button class="btn btn-success" type="submit">Update</button>
                                                <input type="hidden" value="{{ $data->id }}" name="id">
                                                <input type="hidden" value="{{ $data->section_name }}" name="section_name">
                                                <input type="hidden" value="{{ $data->description }}" name="description">
                                                <input type="hidden" value="{{ $data->Created_by }}" name="Created_by">
                                                </td>
                                            </form>

                                        </tr>
                            
                                    </tbody>
                                @endforeach
                            </table>

                            <div class="modal" id="modaldemo8">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Add-Section</h6><button aria-label="Close"
                                                class="close" data-dismiss="modal" type="button"><span
                                                    aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">


                                            <form action={{ route('create.section') }} method="post" autocomplete="off">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="id" id="id" value="">
                                                    <label for="recipient-name" class="col-form-label">Section-name
                                                        :</label>
                                                    <input class="form-control" name="section_name" id="section_name"
                                                        type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Notes :</label>
                                                    <textarea class="form-control" id="description" name="description"></textarea>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="submit">Add</button>
                                            <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                type="button">Close</button>
                                        </div>
                                        </form>
                                    </div>

                                </div>





                            </div>

                        </div>

                    </div>

                </div>








                <!--/div-->
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- /row -->
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection






</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
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
$('$modaldemo').on('show.bs.modal', function(event){

    var button=$(event.relatedTarget) 
    var id = button.data('id')
    var section_name = button.data('section_name')
    var description = button.data('description')
    var modal=$(this)

    model.find('.model-body #id').val(id);
    model.find('.model-body #section_name').val(section_name);
    model.find('.model-body #description').val(description);

    })
    
</script>



@endsection
