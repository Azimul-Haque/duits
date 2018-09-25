@extends('layouts.admin')
@section('body')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Notice</h5>
            </div>
            <div class="ibox-content">
                <form method="post" enctype="multipart/form-data" action="/admin/edit/notice/{{$notice->id}}">
                    {{csrf_field()}}
                    <fieldset class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Head Line</label>
                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="" required name="headline" value="{{$notice->headline}}"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" required name="body">
                                    {{$notice->body}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Photos</label>
                            <div class="col-sm-10"><input type="file" class="form-control" placeholder="" name="photo"></div>
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
            $('.summernote').summernote();
        });
    </script>
@endsection