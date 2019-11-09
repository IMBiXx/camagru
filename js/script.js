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
function showOptions() {
    var elem = document.getElementById('delete');
    if (n % 2)
        elem.classList.add("hidden");
    else
        elem.classList.remove("hidden");
    n++;
}