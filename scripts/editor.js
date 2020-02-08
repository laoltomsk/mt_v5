let samples = [];
let currentBlockIndex = 0;
let currentlyEditingBlock;
let queriesNumber;
let successfulQueriesNumber;

$(document).ready(function() {
    $("#content .block").each(function(i, v) {
        samples[$(v).attr("data-type")] = $(v).clone(true);
        $(v).remove();
    });

    samples["add"] = $("#content .add").clone(true);
    samples["add"].find("button").text("Добавить выше");
    $("#content .add a").remove();

    $("#result").css("display", "none");

    $("#content").on("change", "input[type='file']", function(e) {updPreview(e)});

    $("#content").on("change", "input, textarea", function(e) {currentlyEditingBlock = this;});
    $("#content").on("focus", "input, textarea", function(e) {currentlyEditingBlock = this;});
});

window.onunload = window.onbeforeunload = function(e) {
    let dnc = "DoNotClose";
    e.returnValue = dnc;
    return dnc;
};

addToEnd = function() {
    currentBlockIndex++;
    let whatToAdd = $("#content > .add > select").val();
    let objToAdd = samples[whatToAdd].clone(true);

    objToAdd.attr("id", whatToAdd+currentBlockIndex);
    objToAdd.find(".left").append(samples["add"].clone(true));
    objToAdd.find("button").attr("onclick", "addBeforeMe(\""+objToAdd.attr("id")+"\")");
    objToAdd.find(".left a").attr("onclick", "removeMe(\""+objToAdd.attr("id")+"\")");

    objToAdd.insertBefore($("#content > .add"));
};

addBeforeMe = function(target) {
    currentBlockIndex++;
    let whatToAdd = $("#"+target+" select").val();
    let objToAdd = samples[whatToAdd].clone(true);

    objToAdd.attr("id", whatToAdd+currentBlockIndex);
    objToAdd.find(".left").append(samples["add"].clone(true));
    objToAdd.find("button").attr("onclick", "addBeforeMe(\""+objToAdd.attr("id")+"\")");
    objToAdd.find(".left a").attr("onclick", "removeMe(\""+objToAdd.attr("id")+"\")");

    objToAdd.insertBefore($("#"+target));
};

removeMe = function(target) {
    let whatToDelete = $("#"+target);
    whatToDelete.remove();
};

updPreview = function(e) {
    let preview = $(e.target).closest(".block").find(".preview");
    preview.empty();
    for (let i = 0; i < e.target.files.length; i++) {
        let reader = new FileReader();
        let newImg = document.createElement("img");
        preview.append($(newImg));
        reader.onload = function(e) {
            newImg.src = e.target.result;
        };
        reader.readAsDataURL(e.target.files[i]);
    }
};

function sendQueryToUploadPic(v, i) {
    queriesNumber++;
    let formPhoto = new FormData();
    formPhoto.append("name", $("#headline input").val());
    formPhoto.append("pwd", $("#ftp").val());
    formPhoto.append("id", $(v).attr("id"));
    formPhoto.append("colnum", $(v).find(".colnum").val());
    formPhoto.append("saveNames", $(v).find(".notrename").prop("checked"));
    formPhoto.append("picnum", i);
    formPhoto.append("pic", $(v).find("[type='file']")[0].files[i]);
    $.ajax({
        url: "uploadpic.php",
        data: formPhoto,
        type: "POST",
        processData: false,
        contentType: false,
        success: updateProgressBar
    });
}

sendFormData = function() {
    queriesNumber = 0;
    successfulQueriesNumber = 0;
    $("#pb")[0].style.width = "0%";
    $("#pb").removeClass("failed");

    let formData = new FormData();
    formData.append("title", $("#headline input").val());
    formData.append("author", $("#author").val());
    formData.append("source", $("#source").val());
    formData.append("sourceLink", $("#sourceLink").val());
    formData.append("lead", $("#lead").val());
    formData.append("tags", $("#tags").val());
    formData.append("category", $("#category").val());

    let post = [];
    $("#content .block").each(function(index,formBlock) {
       let block = {};
       block.type = $(formBlock).attr("data-type");
       switch ($(formBlock).attr("data-type")) {
           case "paragraph":
               block.content = $(formBlock).find("textarea").val();
               break;
           case "youtube":
               block.id = $(formBlock).find("input").val();
               break;
           case "picture":
               block.setSizes = $(formBlock).find(".setsize").prop("checked");
               block.columns = $(formBlock).find(".colnum").val();
               block.subscript = $(formBlock).find(".subscript").val();
               block.isInvisible = $(formBlock).find(".invisible").prop("checked");
               block.saveNames = $(formBlock).find(".notrename").prop("checked");
               block.picsId = $(formBlock).attr("id");
               if (block.setSizes) {
                   for (let i = 0; i < $(formBlock).find("[type='file']")[0].files.length; i++) {
                       formData.append(block.picsId + "[]", $(formBlock).find("[type='file']")[0].files[i]);
                   }
               } else {
                   block.files = [];
                   for (let i = 0; i < $(formBlock).find("[type='file']")[0].files.length; i++) {
                       //sendQueryToUploadPic(formBlock, i);
                       block.files[i] = $(formBlock).find("[type='file']")[0].files[i].name;
                   }
               }
               break;
           case "video":
               block.link = $(formBlock).find(".link").val();
               block.isVertical = $(formBlock).find(".vertical").prop("checked");
               break;
           case "link":
               block.content = $(formBlock).find("textarea").val();
               break;
           case "h2":
               block.content = $(formBlock).find("input").val();
               break;
           case "redbutton":
               block.link = $(formBlock).find(".link").val();
               block.text = $(formBlock).find(".text").val();
               break;
           case "raw":
               block.content = $(formBlock).find("textarea").val();
               block.isDiv = $(formBlock).find(".isDiv").prop("checked");
               break;
       };
       post[index] = block;
    });
    formData.append("content", JSON.stringify(post));
    queriesNumber++;
    $.ajax({
        url: "/controllers/createPost.php",
        data: formData,
        type: "POST",
        processData: false,
        contentType: false,
        success: function(data) {
            updateProgressBar();
            $("#result").css("display", "block");
            $("#result textarea").val(data)
        },
        error: function(data) {
            alertFailure(data);
        }
    })
};

bold = function() {
    addBeforeAndAfterSelection("<b>", "</b>")
};

itlc = function() {
    addBeforeAndAfterSelection("<i>", "</i>")
};

line = function() {
    addBeforeAndAfterSelection("<u>", "</u>")
};

link = function() {
    addBeforeAndAfterSelection("<a href='"+$(".flowingmenu input").val()+"'>", "</a>");
};

addBeforeAndAfterSelection = function(before, after) {
    currentlyEditingBlock.value = currentlyEditingBlock.value.substring(0, currentlyEditingBlock.selectionStart)+before+
        currentlyEditingBlock.value.substring(currentlyEditingBlock.selectionStart, currentlyEditingBlock.selectionEnd)+after+
        currentlyEditingBlock.value.substring(currentlyEditingBlock.selectionEnd);
};

updateProgressBar = function() {
    successfulQueriesNumber++;

    let progressBar =  $("#pb")[0];

    if (!progressBar.style.width)
        progressBar.style.width = "0";

    progressBar.style.width = (successfulQueriesNumber*100/queriesNumber)+"%";
};

alertFailure = function() {
    $("#pb").addClass("failed");
};