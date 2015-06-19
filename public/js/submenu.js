/**
 * Created by fab on 5/27/15.
 */

//Submenu TV

if (!submenu)
    var submenu = {};

submenu.showImage = function(){
    $ (".dropmenu li a").mouseover(function(){
        var showImg = $(this).attr("attr-img");
        $("#"+showImg).fadeIn("slow");
    });
    $ (".dropmenu li a").mouseout(function(){
        $(".imgContainer .img-programa").fadeOut('fast');
    });
};

$ (function(){
    submenu.showImage();
});



//Submenu DIGITAL
/*
if (!submenu2)
    var submenu2 = {};

submenu2.showImage = function(){
    $ ("#dropmenuDigi li a").mouseover(function(){
        var showImg = $(this).attr("attr-img");
        $("#"+showImg).fadeIn("slow");
    });
    $ ("#dropmenuDigi li a").mouseout(function(){
        $("#imgDIGITALContainer img.img-programa").fadeOut();
    });
};*/

