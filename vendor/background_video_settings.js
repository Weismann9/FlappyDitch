$(document).ready(function() {
    var videobackground = new $.backgroundVideo($('body'), {
        "align": "centerXY", //вирівнювання
        "width": 1280, //ширина
        "height": 720, //висота
        "path": "assets/", //папка
        "filename": "gameplay", //назва файлу
        "types": ["mp4","ogg","webm"], //формати для різних браузерів
        "preload": true, //прєлоад
        "autoplay": true, //автопрогравання
        "loop": true //зациклювання
    });
});