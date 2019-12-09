function addClass(elem) { 
    elem.classList.remove("hidden");
    elem.classList.add("active");
    elem.classList.add("show");
    elem.classList.remove("none");
}
function delClass(elem) {
    elem.classList.remove("active");
    elem.classList.remove("show");
    elem.classList.add("none");
}
function showMenu(id){
    var menus = ['images', 'parametres'];
    var elem = document.getElementById(id);
    var imageActive = document.getElementById("images-tab");
    var paramActive = document.getElementById("param-tab");
    if (id == menus[0]) {
        var menu = document.getElementById(menus[1]);
        imageActive.classList.add("active");
        paramActive.classList.remove("active");
    }
    else {
        var menu = document.getElementById(menus[0]);
        imageActive.classList.remove("active");
        paramActive.classList.add("active");
    }
    delClass(menu);
    addClass(elem);
    menu.classList.add("hidden");
}
var n = 0;
function showOptions( id ) {
    var elem = document.getElementById('delete-'+id);
    if (n % 2)
        elem.classList.add("hidden");
    else
        elem.classList.remove("hidden");
    n++;
}
function like(img) {
    if (img < 0)
        window.location = "login.php";
    var elem = document.getElementById('heart-'+img);
    var likes = document.getElementById('likes-'+img);
    if (!elem.classList.contains("liked")) {
        elem.classList.add("liked");
        likes.innerHTML++;
    }
    else {
        elem.classList.remove("liked");
        likes.innerHTML--;
    }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'functions/like.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xhr.withCredentials = true;
    xhr.send('image_ID='+img);
}

function chcl(color, id) {
    document.getElementById(id).style.color = color;
}

function uploadImage() {
    var form = document.getElementById('upload');
    var input = document.getElementById('select-img');
    var change_running = false;
    if (input) {
        input.addEventListener('change', function() {
            if(!change_running){
                setTimeout(function(){
                    change_running = true;
                    form.submit();
                    change_running = false;     
                }, 300);
            }
        });
    }
}

function openWebcam() {

 var video = document.querySelector("#videoElement");
 var canvas = document.getElementById('canvas');
 var context = canvas.getContext('2d');
 
  
 if (navigator.mediaDevices.getUserMedia) {       
     navigator.mediaDevices.getUserMedia({video: true})
   .then(function(stream) {
     video.srcObject = stream;
   })
   .catch(function(error) {
     console.log("Something went wrong!");
   });
}
}

function test() {
var video = document.querySelector("#videoElement");
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');

 
if (navigator.mediaDevices.getUserMedia) {       
    navigator.mediaDevices.getUserMedia({video: true})
  .then(function(stream) {
    video.srcObject = stream;
  })
  .catch(function(error) {
    console.log("Something went wrong!");
  });
context.drawImage(video,0,0);
var dataURL = canvas.toDataURL(video);
console.log("Something!");
document.getElementById("capture").value = dataURL;
    }
    
}


// function merge(){
// var c=document.getElementById("myCanvas");
// var ctx=c.getContext("2d");
// var imageObj1 = new Image();
// var imageObj2 = new Image();
// imageObj1.src = "1.png"
// imageObj1.onload = function() {
//    ctx.drawImage(imageObj1, 0, 0, 328, 526);
//    imageObj2.src = "2.png";
//    imageObj2.onload = function() {
//       ctx.drawImage(imageObj2, 15, 85, 300, 300);
//       var img = c.toDataURL("image/png");
//       document.write('<img src="' + img + '" width="328" height="526"/>');
//    }
// };    
// }


function cadre1() { 
    var button = document.getElementById("filter-webcam");
        var cadre1 = "./images/stickers/cadre1.png"
        button.style.width = "640px";
        button.style.height = "480px";
        button.style.position = "absolute";
        button.style.display = "block";
        button.style.backgroundImage = "url(" + cadre1 +")";
        console.log(cadre1);     
}
function cadre2() { 
    var button = document.getElementById("filter-webcam");
        var cadre2 = "./images/stickers/cadre2.png"
        button.style.width = "200px";
        button.style.height = "480px";
        button.style.position = "absolute";
        button.style.display = "block";
        button.style.backgroundImage = "url(" + cadre2 +")";
        console.log(cadre2);     
}

function cadre3() { 
    var button = document.getElementById("filter-webcam");
        var cadre3 = "./images/stickers/cadre3.png"
        button.style.width = "750px";
        button.style.height = "250px";
        button.style.position = "absolute";
        button.style.display = "block";
        button.style.backgroundImage = "url(" + cadre3 +")";
        console.log(cadre3);     
}

function montage_photo(path) {
    console.log(path);

    var filter = document.getElementById("filter-overview");

    filter.style.width = "640px";

    filter.style.height = "480px";

    filter.style.position = "absolute";

    filter.style.display = "block";


        filter.style.backgroundImage = "url(" + path +")";


}