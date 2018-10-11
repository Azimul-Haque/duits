<!DOCTYPE html>
<html>
<head>
  <title>Receipt_{{ $team->registration_id }}</title>
  <link href="/css/user/bootstrap.min.css" rel="stylesheet">
  <script src="/js/user/jquery.min.js"></script>
  <script src="/js/user/bootstrap.min.js"></script>
  <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
  <style type="text/css">
    @page {
        size: 21cm 29.7cm;
        margin: 20mm 20mm 20mm 20mm; /* change the margins as you want them to be. */
    }
    .img-background {
      position: absolute;
      height:500px;
      width:500px;
      left:50%;
      top:50%;
      margin-top:-250px;
      margin-left:-250px;
      /*z-index: -1;*/
      opacity: 0.1;
    }
    
    @media print {
      *, :after, :before {
          color: inherit !important;
          text-shadow: inherit !important;
          background: inherit !important;
          -webkit-box-shadow: inherit !important;
          box-shadow: inherit !important;
      }
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function(){
        window.print();
        window.close();
    });
  </script>
</head>
<body>
  <div class="row">
    <div class="col-md-12">
      <img src="{{ asset('images/print_background.png?unique_id='.date('ymdhis')) }}" class="img-responsive img-background">
      <center>
        <span>5<sup>th</sup> National</span><br/>
        <span style="font-size: 20px;"><b>DUITS Campus IT Fest 2018</b></span><br/>
        <span>Date: 28<sup>th</sup> October &amp; 29<sup>th</sup> October 2018</span><br/>
        <small>Jointly organized by</small><br/>
        <span><b>Dhaka University IT Society</b></span>
        <h3>REGISTRATION RECEIPT</h3>
      </center>
      <hr>

      <table class="table table-bordered" style="width: 100%;">
        <thead>
          <tr>
            <th width="50%">Team Name:</th>
            <td>{{ $team->team }}</td>
          </tr>
          <tr>
            <th width="50%">Event:</th>
            <td>{{ $team->event_name }}</td>
          </tr>
          <tr>
            <th width="50%">Registration Id:</th>
            <td><big><b>{{ $team->registration_id }}</b></big></td>
          </tr>
          <tr>
            <th width="50%">Institution:</th>
            <td>{{ $team->institution }}</td>
          </tr>
          <tr>
            <th width="50%">Email:</th>
            <td>{{ $team->email }}</td>
          </tr>
          <tr>
            <th width="50%">Contact:</th>
            <td>{{ $team->mobile }}</td>
          </tr>
          <tr>
            <th width="50%">Address:</th>
            <td>{{ $team->address }}</td>
          </tr>
          <tr>
            <th width="50%">Amount Paid:</th>
            <td>{{ $team->amount }}/-</td>
          </tr>
          <tr>
            <th width="50%">Transaction Id:</th>
            <td>{{ $team->trxid }}</td>
          </tr>
          <tr>
            <th width="50%">Registration Date:</th>
            <td>{{ date('F d, Y h:i A', strtotime($team->created_at)) }}</td>
          </tr>
        </thead>
      </table><br/>
  
      <h4><b>Award &amp; Prizes:</b></h4>
      <ul>
        <li>Champion &amp; Runners-up Team will be awarded with Prize money.</li>
        <li>Winning Team will be awarded with trophy or crest, where each individual will get medals.</li>
        <li>For gaming, special prize money &amp; gadget will be awarded.</li>
      </ul>
      <h4><b>For Emergency Contact:</b></h4>
      <div>
        Asma Akter<br/>
        General Secretary, Dhaka University IT Society (DUITS)<br/>
        Mobile: 01923 734 867
      </div>
    </div>
  </div>
</body>
</html>