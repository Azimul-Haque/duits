@extends('layouts.admin')
@section('body')
    <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>News</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Heading</th>
                                    <th>Body</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($news as $item)
                                        <tr>
                                            <td>
                                                {{$item->headline}}
                                            </td>
                                            <td>
                                                <?php echo $item->body; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="/admin/edit/news/{{$item->id}}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" href="/admin/delete/news/{{$item->id}}"><i class="fa fa-trash"></i></a>
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
                    <h5>Events</h5>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>Heading</th>
                                <th>Body</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $item)
                                <tr>
                                    <td>
                                        {{$item->headline}}
                                    </td>
                                    <td>
                                        <?php echo $item->body; ?>
                                    </td>
                                    <td>
                                        {{$item->date}}
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="/admin/edit/event/{{$item->id}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="/admin/delete/event/{{$item->id}}"><i class="fa fa-trash"></i></a>
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
                    <h5>Notice</h5>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>Heading</th>
                                <th>Body</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notice as $item)
                                <tr>
                                    <td>
                                        {{$item->headline}}
                                    </td>
                                    <td>
                                        <?php echo $item->body; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="/admin/edit/notice/{{$item->id}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="/admin/delete/notice/{{$item->id}}"><i class="fa fa-trash"></i></a>
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
                    <h5>Committees</h5>
                </div>
                <div class="ibox-content">
                    <button class="btn btn-info" data-toggle="modal" data-target="#addCommitteeModal">Add New Committee</button>
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
                                            <a href="/delete/committee/{{$item->id}}" class="btn btn-danger" data-toggle="confirmation"><span><i class="fa fa-trash"></i></span></a>
                                            <button data-toggle="modal" data-target="#editCommitteeModal_{{$item->id}}" class="btn btn-info"><i class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="ibox-content">
                    <h4>Committee Members</h4>
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
                                            <a class="btn btn-info" href="/admin/edit/committee/member/{{$item->id}}"><i class="fa fa-edit"></i></a>
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

@endsection
@section('script')
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    <script type="javascript" src="/js/validators/committeeTypeValidator.js"></script>
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