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
    var lp = $("#lp_key").val();
    if (lp == "") {
        console.log("lp is empty!");
    }
    var sem = $("#sem_key").val();
    if (sem == "") {
        console.log("sem is empty!");
    } else {
        $(obj).attr(attribute, "data/"+lp+"/"+sem+"/"+src);
        console.log("data/"+lp+"/"+sem+"/"+src);
    }
}

$(document).ready(function() {
    var images = $("img");
    $.each(images, function() {
        var path = $(this).attr("src");
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
        var attributeType = "href";
        var path = $(this).attr(attributeType);
        if (!path.includes("data")) {
            setPath($(this),attributeType,path);
        }
    });

    //select all anchor <a> in <figcaption> and change href accordingly
    // var docs = $("a");
    // $.each(docs, function() {
    //     var attributeType = "href";
    //     var path = $(this).attr(attributeType);
    //     if (!path.includes("data") && path.includes(".pdf")) {
    //         //http://digipiph.com/blog/jquery-each-function-continue-or-break
    //         setPath($(this),attributeType,path);
    //     }
    // });
    //console.clear();
});