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
    if (id == menus[0])
        var menu = document.getElementById(menus[1]);
    else
        var menu = document.getElementById(menus[0]);
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