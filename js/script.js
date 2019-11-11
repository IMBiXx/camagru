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

function like(img) {
    var elem = document.getElementById('like-com');
    var likes = document.getElementById('likes');
    if (!elem.classList.contains("liked")) {
        elem.classList.add("liked");
        likes.innerHTML++;
    }
    else {
        elem.classList.remove("liked");
        likes.innerHTML--;
    }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'like.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xhr.send('image_ID='+img);
}

function chcl(color, id) {
    document.getElementById(id).style.color = color;
}