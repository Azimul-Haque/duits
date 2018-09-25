@extends('layouts.admin')
@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Committee Member</h5>
                </div>
                <div class="ibox-content">
                    <fieldset class="form-horizontal">
                        <form method="post" action="/admin/edit/committee/{{$member->id}}" enctype="multipart/form-data">
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
                            <div class="form-group"><label class="col-sm-2 control-label">Sselect Committee Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="type" required>
                                        <option value="">Select One</option>
                                        @foreach($committees as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Photo</label>
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
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('[name=status]').val('{{$member->status}}');
            $('[name=type]').val('{{$member->committee_type_id}}');

        });
    </script>
    @endsection