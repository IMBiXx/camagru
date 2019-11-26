<!DOCTYPE html>
<html>
 <body>
<div id="container">
    <video autoplay="true" id="videoElement"></video>
    <a href = '#' id= "capture" > prendre une photo</a>
    <canvas id="canvas"></canvas>
</div>

<script>
var video = document.querySelector("#videoElement");
var canvas= document.getElementById('canvas');
var context = canvas.getContext('2d');

 
if (navigator.mediaDevices.getUserMedia) {       
    navigator.mediaDevices.getUserMedia({video: true})
  .then(function(stream) {
    video.srcObject = stream;
  })
  .catch(function(error) {
    console.log("Something went wrong!");
  });

  document.getElementById('capture').addEventListener('click', function() {
      context.drawImage(video,0,0,100,130);
  });
}
</script>
</body>
</html>