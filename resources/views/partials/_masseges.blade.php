@if(Session::has('success_roleofhonor_post'))
    <div class="modal fade success-popup" id="success_roleofhonor_post" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="lead">{{Session::get('success_roleofhonor_post')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif
@if(Session::has('success_administration_post'))
    <div class="modal fade success-popup" id="success_administration_post" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="lead">{{Session::get('success_administration_post')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('success_news_post'))
    <div class="modal fade success-popup" id="success_news_post" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="lead">{{Session::get('success_news_post')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif
@if(Session::has('success_edit'))
    <div class="modal fade success-popup" id="success_edit" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="lead">{{Session::get('success_edit')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('success_delete'))
    <div class="modal fade success-popup" id="success_delete" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="lead">{{Session::get('success_delete')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif
@if(Session::has('success_post'))
    <div class="modal fade success-popup" id="success_post" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="lead">{{Session::get('success_post')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('registration_confirmation'))
    <div class="modal fade success-popup" id="registration_confirmation" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="lead">{{Session::get('registration_confirmation')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif
@if(Session::has('success_msg_send'))
    <div class="modal fade success-popup" id="success_msg_send" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="lead">{{Session::get('success_msg_send')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif