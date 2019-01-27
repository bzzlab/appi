//filter specific images whose path shouldn't be changed
function filterImages(src){
    //filter the following images
    var filterList = ["zoom-in", "video", "red.ico", "yellow.ico", "draft.png"];
    for (var i in filterList) {
        if (src.includes(filterList[i])){
            return true;
        }
    }
    return false;
}

//set correct path
function setPath(obj,attribute,src){
    //src path should be changed with the lp (Lehrperson) key
    let lp = $("#lp_key").val();
    if (lp == "") {
        console.log("lp is empty!");
    }
    let sem = $("#sem_key").val();
    if (sem == "") {
        console.log("sem is empty!");
    } else {
        $(obj).attr(attribute, "data/"+lp+"/"+sem+"/"+src);
        console.log("data/"+lp+"/"+sem+"/"+src);
    }
}


$(document).ready(function() {
    //select all <src> in <img> and change href accordingly
    let images = $("img");
    $.each(images, function() {
        let path = $(this).attr("src");
        //Filter: check if specific images' paths shouldn't be changed
        if (filterImages(path) === false) {
            //if src does not contain the path-part data, then ...
            if (!path.includes("data")) {
                setPath($(this),"src",path);
            }
        }
    });


    //select all anchor <a> in <figcaption> and change href accordingly
    images = $("figcaption a");
    $.each(images, function() {
        let attributeType = "href";
        let path = $(this).attr(attributeType);
        if (!path.includes("data")) {
            setPath($(this),attributeType,path);
        }
    });

    //select all source <source> in <video> and change src-attribute accordingly
    images = $("video");
    $.each(images, function() {
        let attributeType = "src";
        let path = $(this).attr(attributeType);
        if (path!=null){
            if (!path.includes("data")) {
                setPath($(this),attributeType,path);
            }
        }
    });
});



/*
Neither this way nor the way above adjusts the path of the video > source
Maybe by creating a video-player element with handlebars or javascript might be
a solution. For inspiration see
https://tomelliott.com/html-5/changing-html5-video-javascript-jquery
https://stackoverflow.com/questions/5235145/changing-source-on-html5-video-tag

 */
/*
function getPath(src){
    //src path should be changed with the lp (Lehrperson) key
    let lp = $("#lp_key").val();
    if (lp == "") {
        console.log("lp is empty!");
    }
    let sem = $("#sem_key").val();
    if (sem == "") {
        console.log("sem is empty!");
    } else {
        console.log("data/"+lp+"/"+sem+"/"+src);
        return "data/"+lp+"/"+sem+"/"+src;
    }
}

function adjustLink() {
    let p = document.getElementsByTagName("video source");
    for (let i = 0; i < p.length; i++) {
        let path = getPath(p[i].getAttribute("src"));
        p[i].setAttribute('src',path);
        p[i].load();
    }
}
*/
//document.addEventListener('DOMContentLoaded', adjustLink);
