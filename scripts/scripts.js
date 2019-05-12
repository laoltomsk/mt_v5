function LoadMoreFromIndexPage(from) {
    let xhr = new XMLHttpRequest();
    xhr.open('get', '/controllers/getMorePosts.php?from='+from);
    xhr.send();
    xhr.onload = function() {
        document.getElementById("list_news").innerHTML += xhr.responseText;
        let newsCount = document.getElementsByTagName("section").length;
        let id = document.getElementsByTagName("section")[newsCount-1].getAttribute("data-id");
        document.getElementsByClassName("loadMoreButton")[0].setAttribute("onclick", "LoadMoreFromIndexPage("+id+")");
    }
}

function LoadMoreFromCategory(from, category) {
    let xhr = new XMLHttpRequest();
    xhr.open('get', '/controllers/getMorePostsByCategory.php?from='+from+'&category='+category);
    xhr.send();
    xhr.onload = function() {
        document.getElementById("list_news").innerHTML += xhr.responseText;
        let newsCount = document.getElementsByTagName("section").length;
        let id = document.getElementsByTagName("section")[newsCount-1].getAttribute("data-id");
        document.getElementsByClassName("loadMoreButton")[0].setAttribute("onclick", "LoadMoreFromCategory("+id+",'"+category+"')");
    }
}

function LoadMoreByTag(from, category, tag) {
    let xhr = new XMLHttpRequest();
    xhr.open('get', '/controllers/getMorePostsByTag.php?from='+from+'&category='+category+'&tag='+tag);
    xhr.send();
    xhr.onload = function() {
        document.getElementById("list_news").innerHTML += xhr.responseText;
        let newsCount = document.getElementsByTagName("section").length;
        let id = document.getElementsByTagName("section")[newsCount-1].getAttribute("data-id");
        document.getElementsByClassName("loadMoreButton")[0].setAttribute("onclick", "LoadMoreFromCategory("+id+",'"+category+"','"+tag+"')");
    }
}

function AddView(id) {
    let xhr = new XMLHttpRequest();
    xhr.open('get', '/controllers/addViewToPost.php?id='+id);
    xhr.send();
}

function Redirect(loc) {
    document.location.assign(loc);
}