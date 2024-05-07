 //lightGallery(document.getElementById('lightgallery'));
var list = document.getElementsByClassName("lightgallery");
for (var i = 0; i < list.length; i++) {
    // list[i] is a node with the desired class name
    lightGallery(list[i]);
}
