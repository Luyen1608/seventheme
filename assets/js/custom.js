$(document).ready(function() {
    $(".btn-toggle").click(function() {
        $(this).parent().children(".content-toggle").slideToggle();
    });

});
mobileOverlayFilter = document.querySelector(".mobile-overlay-filter");
collectionFilter = document.querySelector(".collection-filter");
filterBtn = document.querySelector(".filter-btn");
filterBack = document.querySelector(".filter-back");

if (mobileOverlayFilter) {
    mobileOverlayFilter.onclick = () => {
        collectionFilter.classList.toggle("active");
        mobileOverlayFilter.classList.toggle("active");
    };
}
if (filterBack) {
filterBack.onclick = () => {
    collectionFilter.classList.toggle("active");
    mobileOverlayFilter.classList.toggle("active");
};
}
if (filterBtn) {
filterBtn.onclick = () => {
    collectionFilter.classList.toggle("active");
    mobileOverlayFilter.classList.toggle("active");
};
}
var coll = document.getElementsByClassName("collapsible-ct");
if (coll[0]) {
    coll[0].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = document.getElementById('content-collapsible');
        if (content.style.display === "block") {
            content.style.display = "none";
            $("#showmore").html("Xem thêm");
        } else {
            content.style.display = "block";
            $("#showmore").html("Thu gọn");
        }
    });
}