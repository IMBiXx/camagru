
var video = document.querySelector("#videoElement");
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');

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
function test() {
    // event.preventDefault();
    context.drawImage(video,0,0);
    var dataURL = canvas.toDataURL(video);
    var xhr = new XMLHttpRequest();
    var path = "post.php";
    // var data = JSON.stringify({image: dataURL});
    console.log(dataURL);
    document.getElementById("capture").value= dataURL;
      
       /*  xhr.open("POST", path, true);
        xhr.setRequestHeader("Content-Type", "text/html; charset=UTF-8");
        xhr.send('webcamuploaded=' + data); */
        
       
     
};
function openWebcam() {
    
    
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

function uploadProfilImage() {
    // var formCover = document.getElementById('cover');
    // var formPp = document.getElementById('add_pp');
    // if (formCover)
    //     var inputCover = document.getElementById('file');
    // if (formPp)
    //     var inputPp = document.getElementById('pp');
    // var change_running = false;
    // if (formPp) {
    //     inputPp.addEventListener('change', function() {
    //         if(!change_running){
    //             setTimeout(function(){
    //                 change_running = true;
    //                 formPp.submit();
    //                 change_running = false;     
    //             }, 300);
    //         }
    //     });
    // }
}