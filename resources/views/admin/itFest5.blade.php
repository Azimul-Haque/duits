@extends('layouts.admin')
@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Registrations</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Team Name</th>
                                <th>Other Members</th>
                                <th>Event</th>
                                <th>Registration ID</th>
                                <th>Institution</th>
                                <th>Mobile</th>
                                <th>Amount</th>
                                <th>TrxId</th>
                                <th>Payment Status</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($registrations as $registration)
                                    <tr>
                                        <td>{{ date('F d, Y H:i A', strtotime($registration->created_at)) }}</td>
                                        <td>{{ $registration->team }}</td>
                                        <td>
                                            {{ $registration->member1 }}, 
                                            {{ $registration->member2 }}, 
                                            {{ $registration->member3 }}, 
                                            {{ $registration->member4 }}
                                        </td>
                                        <td>{{ $registration->event_name }}</td>
                                        <td>{{ $registration->registration_id }}</td>
                                        <td>{{ $registration->institution }}</td>
                                        <td>{{ $registration->mobile }}</td>
                                        <td>{{ $registration->amount }} /-</td>
                                        <td>{{ $registration->trxid }}</td>
                                        <td>
                                            @if($registration->payment_status == 0)
                                                Not Paid
                                            @else
                                                Paid
                                            @endif
                                        </td>
                                        <td>{{ $registration->card_type }}</td>
                                        <td>
                                            <img src="{{ asset('images/registration/' . $registration->imagepath) }}" style="height: 30px; width: 30px">
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
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Cover</h5>
                </div>
                <div class="ibox-content">
                <button class="btn btn-info" data-toggle="modal" data-target="#addCoverModal">Add New Cover</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($covers as $item)
                                    <tr>
                                        <td>
                                            {{$item->title}}
                                        </td>
                                        <td>
                                            <img src="/uploads/itFest5/cover/{{$item->image}}" style="height: 30px; width: 30px">
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="/admin/delete/itFest5/cover/{{$item->id}}"><i class="fa fa-trash"></i></a>
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
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Guests</h5>
                </div>
                <div class="ibox-content">
                <button class="btn btn-info" data-toggle="modal" data-target="#addGuestModal">Add New Guest</button>
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
                            @foreach($guests as $item)
                                <tr>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{$item->designation}}
                                    </td>
                                    <td>
                                        <img src="/uploads/itFest5/guest/{{$item->photo}}" style="height: 30px; width: 30px">
                                    </td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#editGuestModal{{$item->id}}"><i class="fa fa-edit"></i></button>
                                        <a class="btn btn-danger" href="/admin/delete/itFest5/guest/{{$item->id}}"><i class="fa fa-trash"></i></a>
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
    <div id="addCoverModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Cover</h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-horizontal">
                    <form id="cover_form" method="post" enctype="multipart/form-data" action="{{Route('admin.store.itFest.cover')}}">
                        {{csrf_field()}}
                        <div class="form-group"><label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10"><input id="title" type="text" class="form-control" placeholder="" required name="title"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Photo</label>
                            <div class="col-sm-10"><input type="file" class="form-control" placeholder="" name="photo" required></div>
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
    <div id="addGuestModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Guest</h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-horizontal">
                    <form id="guest_form" method="post" enctype="multipart/form-data" action="{{Route('admin.store.itFest.guest')}}">
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
    @foreach($guests as $item)
    {{-- edit guest modal --}}
    <div id="editGuestModal{{$item->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Guest</h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-horizontal">
                    <form id="guest_form" method="post" enctype="multipart/form-data" action="{{ route('admin.update.itFest.guest') }}">
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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    <script type="javascript" src="/js/validators/committeeTypeValidator.js"></script>
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
                ],
                order: [[ 0, "desc" ]],
                columnDefs: [
                      { targets: [0], type: 'date'}
                ]
            });

        });

    </script>
    @endsection