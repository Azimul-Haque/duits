@extends('layouts.admin')
@section('body')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Committees</h5>
            </div>
            <div class="ibox-content">
                <button class="btn btn-info" data-toggle="modal" data-target="#addCommitteeModal">Add New Committee</button><br/>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($committees as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        <a href="/admin/delete/committee/{{$item->id}}" class="btn btn-danger" data-toggle="confirmation"><span><i class="fa fa-trash"></i></span></a>
                                        <button data-toggle="modal" data-target="#editCommitteeModal_{{$item->id}}" class="btn btn-info"><i class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h4>Committee Members</h4>
            </div>
            <div class="ibox-content">
                <button class="btn btn-info" data-toggle="modal" data-target="#addCommitteeMemberModal">Add Committee Member</button><br/>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($committees as $committee)
                            @foreach($committee->committee as $item)
                                <tr>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        <img src="/images/committees/{{$item->photo}}" style="height: 30px; width: 30px">
                                    </td>
                                    <td>
                                        {{ucwords($item->designation)}}
                                    </td>
                                    <td>
                                        {{ucwords($item->status)}}
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editCommitteeMemberModal_{{$item->id}}" class="btn btn-info"><i class="fa fa-edit"></i></button>
                                        <a class="btn btn-danger" href="/admin/delete/committee/member/{{$item->id}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="addCommitteeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Committee</h4>
            </div>
            <div class="modal-body">
                <fieldset class="form-horizontal">
                <form id="committee_form" method="post" action="{{Route('admin.store.committee')}}">
                    {{csrf_field()}}
                    <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10"><input id="name" type="text" class="form-control" placeholder="" required name="name"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" required name="description" rows="6"></textarea>
                        </div>
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
@foreach($committees as $item)
    <div id="editCommitteeModal_{{$item->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Committee</h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-horizontal">
                        <form method="post" action="/admin/update/committee/{{$item->id}}">
                            {{csrf_field()}}
                            <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10"><input value="{{$item->name}}" type="text" class="form-control" placeholder="" required name="name"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea  class="form-control" required name="description" rows="6">{{$item->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-10 col-sm-2">
                                    <input type="submit" class="btn btn-info" value="Save">
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>

        </div>
    </div>
@endforeach

@foreach($committees as $committee)
    @foreach($committee->committee as $member)
    <div id="editCommitteeMemberModal_{{$member->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Committee Member</h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-horizontal">
                        <form method="post" action="/admin/edit/committee/member/{{$member->id}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10"><input value="{{$member->name}}" type="text" class="form-control" placeholder="" required name="name"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Designation</label>
                                <div class="col-sm-10">
                                    <input value="{{$member->designation}}" type="text" class="form-control" placeholder="" required name="designation">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="Former">Former</option>
                                        <option value="Current">Current</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Select Committee Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="type" required>
                                        <option value="">Select One</option>
                                        @foreach($committees as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Photo  (300x300)</label>
                                <div class="col-sm-10"><input type="file" name="pic" accept="image/*"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Facebook</label>
                                <div class="col-sm-10"><input value="{{$member->fb}}" type="url" class="form-control" placeholder="" name="fb"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Twitter</label>
                                <div class="col-sm-10"><input value="{{$member->twitter}}" type="url" class="form-control" placeholder="" name="twitter"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Google Plus</label>
                                <div class="col-sm-10"><input type="url" value="{{$member->g_plus}}" class="form-control" placeholder="" name="g_plus"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-w-m btn-primary">Save</button></div>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>

        </div>
    </div>
    @endforeach
@endforeach



<div id="addCommitteeMemberModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Committee Member</h4>
            </div>
            <div class="modal-body">
                <fieldset class="form-horizontal">
                    <form method="post" action="{{Route('admin.store.committee.member')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="" required name="name"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Designation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" required name="designation">
                        </div>
                    </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="status" required>
                                    <option value="">Select Status</option>
                                    <option value="Former">Former</option>
                                    <option value="Current">Current</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Select Committee Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="type" required>
                                    <option value="">Select One</option>
                                    @foreach($committees as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Photo  (300x300)</label>
                            <div class="col-sm-10"><input type="file" name="pic" accept="image/*"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Facebook</label>
                            <div class="col-sm-10"><input type="url" class="form-control" placeholder="" name="fb"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Twitter</label>
                            <div class="col-sm-10"><input type="url" class="form-control" placeholder="" name="twitter"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Google Plus</label>
                            <div class="col-sm-10"><input type="url" class="form-control" placeholder="" name="g_plus"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-w-m btn-primary">Save</button></div>
                    </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 5,
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