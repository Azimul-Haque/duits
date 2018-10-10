@extends('layouts.admin')
@section('body')

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
                <h5>Add Notice</h5>
            </div>
            <div class="ibox-content">
                <form method="post" enctype="multipart/form-data" action="{{Route('admin.store.notice')}}">
                    {{csrf_field()}}
                    <fieldset class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Head Line</label>
                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="" required name="headline"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" required name="body">

                                </textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10"><button type="submit" class="btn btn-w-m btn-primary">Submit</button></div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.summernote').summernote({
                placeholder: 'Enter Description',
                tabsize: 2,
                height: 200
            });
        });
    </script>
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