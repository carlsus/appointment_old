<!DOCTYPE html>
<html>
  <head>
    <title>Scan QR Code</title>
    @include('layouts.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <style>
        .center {
  margin: auto;
  width: 30%;

}
</style>
  </head>
  <body>
    
    <div class="row">
      <div class="col-md-3">
      </div>
          <div class="col-md-8">
            <video id="preview"></video>
          
          </div>
          <div class="col-md-2">
          </div>
    </div>
      
       
      

        
<div class="row">
  <div class="col-md-2">
  </div>
      <div class="col-md-8">
        <h5 class="text-center">Scan QR Code</h5>
      <div class="card card-default">
      <div class="card-header">
      <h3 class="card-title">
      <i class="fas fa-exclamation-triangle"></i>
     
      </h3>
      </div>

      <div class="card-body">

        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-info"></i> Alert!</h5>
          
          </div>

          <strong><i class="fas fa-info mr-1"></i> Appointee</strong>
          <p class="text-muted" id="appointee_name">
              
          </p>
          <hr>
          <strong><i class="fas fa-clock"></i> Appointment Time</strong>
          <p class="text-muted" id="appointment_time"></p>
          <hr>
          <strong><i class="fas fa-user"></i> Teacher</strong>
          <p class="text-muted" id="teacher_name">
          
          </p>

</div>
      </div>

      </div>
      </div>
      <div class="col-md-2">
      </div>
</div>
    
    <script type="text/javascript">

      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

      scanner.addListener('scan', function (content) {

        $.ajax({
            dataType: 'json',
            url: 'appointments/' + content,

            success:function(data){
                if(data){
                  $('#appointee_name').text(data.appointee.firstname + ' ' + data.appointee.lastname);
                  $('#appointment_time').text(data.appointment_date_start + ' ' + data.appointment_date_end);
                  $('#teacher_name').text(data.teacher.firstname + ' ' + data.teacher.lastname);
                }else{
                  $('#appointee_name').text('');
                  $('#appointment_time').text('');
                  $('#teacher_name').text('');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              
               
              
            }
        });

      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');

        }

      }).catch(function (e) {
        console.error(e);
      });

    </script>
    @include('layouts.scripts')
  </body>
</html>
