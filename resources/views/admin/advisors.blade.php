@extends('layouts.admin')
@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Advisors</h5>
                </div>
                <div class="ibox-content">
                <button class="btn btn-info" data-toggle="modal" data-target="#addAdvisorModal">Add New Adviso</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($advisors as $item)
                                <tr>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{$item->designation}}
                                    </td>
                                    <td>
                                        <img src="/images/advisors/{{$item->photo}}" style="height: 30px; width: 30px">
                                    </td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#editAdvisorModal{{$item->id}}"><i class="fa fa-edit"></i></button>
                                        <a class="btn btn-danger" href="{{ route('admin.advisor.delete', $item->id) }}"><i class="fa fa-trash"></i></a>
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
    
    <div id="addAdvisorModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Guest</h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-horizontal">
                    <form id="guest_form" method="post" enctype="multipart/form-data" action="{{Route('admin.advisor.store')}}">
                        {{csrf_field()}}
                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10"><input id="name" type="text" class="form-control" placeholder="Name" required name="name"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Designation</label>
                            <div class="col-sm-10"><input id="designation" type="text" class="form-control" placeholder="Designation" required name="designation"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Institution</label>
                            <div class="col-sm-10"><input id="institution" type="text" class="form-control" placeholder="Institution/ Work Place/ Address" required name="institution"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Photo (300x300)</label>
                            <div class="col-sm-10"><input type="file" class="form-control" placeholder="" name="photo"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-blue" value="Save">
                            </div>
                        </div>
                    </form>
                    </fieldset>
                </div>
            </div>

        </div>
    </div>

    @foreach($advisors as $item)
    {{-- edit guest modal --}}
    <div id="editAdvisorModal{{$item->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Advisor</h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-horizontal">
                    <form id="guest_form" method="post" enctype="multipart/form-data" action="{{ route('admin.advisor.update') }}">
                        {{csrf_field()}}
                        <input type="hidden" required name="id" value="{{$item->id}}">
                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10"><input id="name" type="text" class="form-control" placeholder="Name" required name="name" value="{{$item->name}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Designation</label>
                            <div class="col-sm-10"><input id="designation" type="text" class="form-control" placeholder="Designation" required name="designation" value="{{$item->designation}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Institution</label>
                            <div class="col-sm-10"><input id="institution" type="text" class="form-control" placeholder="Institution/ Work Place/ Address" required name="institution" value="{{$item->institution}}"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Photo (300x300)</label>
                            <div class="col-sm-10"><input type="file" class="form-control" placeholder="" name="photo"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-blue" value="Save">
                            </div>
                        </div>
                    </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    {{-- edit guest modal --}}
    @endforeach


@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>
    @endsection