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

{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
<script src="/js/user/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}

<script type="text/javascript">
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "500",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
</script>
   
@if (Session::has('success'))
    {{-- <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{Session::get('success')}}
    </div> --}}
    <script type="text/javascript">
        if($(window).width() > 768) {
            toastr.success('{{Session::get('success')}}', 'SUCCESS').css('width', '400px');
        } else {
            toastr.success('{{Session::get('success')}}', 'SUCCESS').css('width', ($(window).width()-25)+'px');
        }
    </script>
@endif


@if (count($errors) > 0)
    {{-- <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>ত্রুটি:</strong> 
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}
    @foreach ($errors->all() as $error)
      <script type="text/javascript">
            if($(window).width() > 768) {
                toastr.error('{{ $error }}', 'ERROR').css('width', '400px');
            } else {
                toastr.error('{{ $error }}', 'ERROR').css('width', ($(window).width()-25)+'px');
            }
        </script>
    @endforeach 
@endif

@if(session('info'))
    {{-- <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('info') }}
    </div> --}}
  <script type="text/javascript">
        if($(window).width() > 768) {
            toastr.info('{{ session('info') }}', 'INFO').css('width', '400px');
        } else {
            toastr.info('{{ session('info') }}', 'INFO').css('width', ($(window).width()-25)+'px');
        }
    </script>
@endif

@if(session('warning'))
    <script type="text/javascript">
        if($(window).width() > 768) {
            toastr.warning('{{ session('warning') }}', 'WARNING').css('width', '400px');
        } else {
            toastr.warning('{{ session('warning') }}', 'WARNING').css('width', ($(window).width()-25)+'px');
        }
    </script>
@endif