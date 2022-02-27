<!DOCTYPE html>
<html>
  <head>
    <title>Scan QR Code</title>
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

    <div class="center">
        <video id="preview"></video>
    </div>


    <script type="text/javascript">

      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

      scanner.addListener('scan', function (content) {

        $.ajax({
            dataType: 'json',
            url: 'appointments/' + content,

            success:function(data){
                console.log(data);
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
  </body>
</html>
