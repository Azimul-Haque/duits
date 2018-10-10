<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

    <link href="/css/admin/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="/css/admin/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/js/admin/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/css/admin/animate.css" rel="stylesheet">
    <link href="/css/admin/style.css" rel="stylesheet">

    <!--- editor -->
    <link href="/css/admin/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/css/admin/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="/css/admin/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="/js/admin/bootstrap-confirmation.min.js" rel="stylesheet">

</head>

<body>
<div id="wrapper">
    @if(Auth::user())
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Name</strong>
                                </span> <span class="text-muted text-xs block">Admin</span></span></a>
                    </div>

                </li>
                <li>
                    <a href="{{Route('admin.dashboard')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Home</span></a>
                    <a href="{{Route('admin.add.committee.member')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Committee</span></a>
                    <a href="{{Route('admin.notice.add')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Notice</span></a>
                    <a href="{{Route('admin.news.add')}}"><i class="fa fa-diamond"></i> <span class="nav-label">News</span></a>
                    <a href="{{Route('admin.events.add')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Events</span></a>
                    <a href="{{Route('admin.itFest5')}}"><i class="fa fa-diamond"></i> <span class="nav-label">5th IT Fest</span></a>
                </li>
            </ul>

        </div>
    </nav>
    @endif

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.7.1/search_results.html">
                    </form>
                </div>
                @if(Auth::user())
                <ul class="nav navbar-top-links navbar-right">

                    <li>
                        <!-- Menu Toggle Button -->
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>
                            Signout
                        </a>

                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                    @endif

            </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            @yield('body')
        </div>
        <div class="footer">
            <div class="pull-right">
            </div>
            <div>
                <strong>Copyright</strong> DUITS. &copy; 2018
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="/js/admin/jquery-3.1.1.min.js"></script>
<script src="/js/admin/bootstrap.min.js"></script>
<script src="/js/admin/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Flot -->
<script src="/js/admin/plugins/flot/jquery.flot.js"></script>
<script src="/js/admin/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/js/admin/plugins/flot/jquery.flot.spline.js"></script>
<script src="/js/admin/plugins/flot/jquery.flot.resize.js"></script>
<script src="/js/admin/plugins/flot/jquery.flot.pie.js"></script>

<!-- Peity -->
<script src="/js/admin/plugins/peity/jquery.peity.min.js"></script>
<script src="/js/admin/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="/js/admin/inspinia.js"></script>
<script src="/js/admin/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="/js/admin/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="/js/admin/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="/js/admin/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="/js/admin/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="/js/admin/plugins/chartJs/Chart.min.js"></script>

<!-- Toastr -->
<script src="/js/admin/plugins/toastr/toastr.min.js"></script>

<script src="/js/admin/plugins/summernote/summernote.min.js"></script>
<script src="/js/admin/plugins/dataTables/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        var data1 = [
            [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
        ];
        var data2 = [
            [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
        ];
        $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
            {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#d5d5d5'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis:{
                },
                yaxis: {
                    ticks: 4
                },
                tooltip: false
            }
        );

        var doughnutData = {
            labels: ["App","Software","Laptop" ],
            datasets: [{
                data: [300,50,100],
                backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
            }]
        } ;


        var doughnutOptions = {
            responsive: false,
            legend: {
                display: false
            }
        };


        var ctx4 = document.getElementById("doughnutChart").getContext("2d");
        new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        var doughnutData = {
            labels: ["App","Software","Laptop" ],
            datasets: [{
                data: [70,27,85],
                backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
            }]
        } ;


        var doughnutOptions = {
            responsive: false,
            legend: {
                display: false
            }
        };


        var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
        new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});
        @if(Session::has('success_edit'))
            $('#success_edit').modal('show');

        @elseif(Session::has('success_delete'))
            $('#success_delete').modal('show');

        @elseif(Session::has('success_news_post'))
            $('#success_news_post').modal('show');

        @elseif(Session::has('success_administration_post'))
            $('#success_administration_post').modal('show');

        @elseif(Session::has('success_roleofhonor_post'))
            $('#success_roleofhonor_post').modal('show');

        @elseif(Session::has('success_post'))
        $('#success_post').modal('show');
        @endif

    });
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-4625583-2', 'webapplayers.com');
    ga('send', 'pageview');

</script>
@yield('script')
@include('partials._messages')
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jan 2018 10:55:25 GMT -->
</html>