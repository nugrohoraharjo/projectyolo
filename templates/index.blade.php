<html lang="en" style="height: auto;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yolo Flask</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css') }}">
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url_for('static', filename='dist/css/adminlte.min.css') }}">
  <style>
    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
  </style>
</head>
<body class="layout-top-nav" style="height: auto;">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="">
        <img src="{{ url_for('static', filename='dist/img/pnjlogo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      </a>
      <span class="brand-text font-weight-light">Deteksi Alat Pelindung Diri <br><small style="font-size:12px;">Powered By: Prodi Alat Berat Politeknik Negeri Jakarta</small></span>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        
      </div>

    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 487px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-1">
          
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container"  style="width:120%;">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h5 class="card-title">Livestream</h5>
                  </div>
                  <div class="col-6">
                    <div class="float-right">
                    <!-- <a href="{{ url_for('video_off') }}" id=test> <button class="btn btn-sm btn-primary">Camera On</button></a> -->
                      <button class="btn btn-sm btn-primary" onclick="onCam()">Camera On</button>
                      <button class="btn btn-sm btn-info" id="testtoast">Camera Off</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body text-center">
                <img id="myCamera" src="{{ url_for('static', filename='dist/img/pnjlogo.jpg') }}" width="550px" height="350px"/>
              </div>
              <!-- <div class="card-body text-center">
                <p>kambing</p>
                <div id="basic" style="text-align:center;">
                <video class="videostream" autoplay="" controls></video>
                <audio class="audiostream" autoplay=""></audio>
                <p>
                  <button class="capture-button">Capture</button>
                  <button id="stop-button">Stop</button>
                </p>
                </div>
              </div> -->
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header" style="width:120%;">
                <h5 class="card-title m-0">Safety Monitoring</h5>
                <h6 id="jumlah">0</h6>
              </div>              
              <div id="capture" class="card-body" style="overflow-y:scroll; height:400px;">
                
                

              </div>


              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div> -->
  
  <footer class="main-footer" style="margin-top:-30px;">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Version 1.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright © 2021 <a href="https://pnj.ac.id/">Politeknik Negeri Jakarta</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->




<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="{{ url_for('static', filename='plugins/jquery/jquery.min.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
<!-- Bootstrap 4 -->
<script src="{{ url_for('static', filename='plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url_for('static', filename='dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url_for('static', filename='plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ url_for('static', filename='plugins/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ url_for('static', filename='plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ url_for('static', filename='dist/js/demo.js') }}"></script>
<script>
  function loadLatest(){
     window.location='{{url_for('savedcapture')}}'
    // document.getElementById('myCamera').src='{{ url_for('static', filename='dist/img/pnjlogo.jpg') }}'
  }
</script>
<script>
  function onCam(){
    var audio = new Audio('https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233524/success.mp3');
    const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1000
        });
    audio.play();
    Toast.fire({
            type: 'success',
            icon: 'success',
            title: 'Memulai YoloV5 camera',
            });
        
    document.getElementById('myCamera').src='{{ url_for('video') }}';
    
  }
</script>
<!-- <script>
  (function() {
  
  const video = document.querySelector('#basic video');
  const audio = document.querySelector('#basic audio');
  
  const captureVideoButton = document.querySelector('#basic .capture-button');
  const stopVideoButton = document.querySelector('#basic #stop-button');
  
  //Capture Video
  captureVideoButton.onclick = function() {
     navigator.mediaDevices.getUserMedia({
      audio: true,
      video: true
    })
    .then(stream => {
      window.localStream = stream;
      video.srcObject = stream;
      audio.srcObject = stream;
    })
    .catch((err) => {
      console.log(err);
    });
  };
  
  stopVideoButton.onclick = function() {
    localStream.getVideoTracks()[0].stop();
    video.src = '';
    
    localStream.getAudioTracks()[0].stop();
    audio.src = '';
  };
})(); -->
</script>
<script>
  // function offCamera(){
  //   var audio = new Audio('https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233574/error.mp3');
  //   const Toast = Swal.mixin({
  //         toast: true,
  //         position: 'top-end',
  //         showConfirmButton: false,
  //         timer: 1000
  //       });
  //       $.ajax({
  //         url: '/video_off',
  //         method: "GET",
  //         dataType: 'json',
  //         success: function(response) {
  //           audio.play();
  //           Toast.fire({
  //           type: 'success',
  //           icon: 'error',
  //           title: response
  //           });
  //         }
  //       });
  //   document.getElementById('myCamera').src='{{ url_for('static', filename='dist/img/pnjlogo.jpg') }}';
  // }
</script>
<script type="text/javascript">
    $(function() {
        var audio = new Audio('https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233574/error.mp3');
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1000
        });
        $('#testtoast').click(function() {
          audio.play();
          Toast.fire({
            type: 'success',
            icon: 'error',
            title: ' Camera dihentikan'
            });          
          });
          
      });
</script>
<script>
  $(document).ready(function () {
  setInterval(timingLoad, 3000);
  function timingLoad(){
    var audio = new Audio('https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233294/info.mp3');
    var datacount = parseInt($('#jumlah').html());
    const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1000
        });
    $.ajax({
    url: '/savedcapture',
    method: "GET",
    dataType: 'json',
    success: function(response) {
    myVariable = response[1];
    jumlah = myVariable - datacount;
    if(datacount != 0 && datacount < parseInt(response[1]) && datacount ){
        audio.play();
        Toast.fire({
            type: 'error',
            icon: 'warning',
            title: jumlah+'capture baru',
            });
      
    }
    
    $('#capture').html(response[0]);
    $('#jumlah').html(response[1]);
    }
    });

  }
  });
</script>

</body></html>