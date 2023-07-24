$(document).ready(function() {
    $(".btn-toggle").click(function() {
        $(this).parent().children(".content-toggle").slideToggle();
        // $(".content-toggle").slideToggle();
    });
});

$('.filter-btn').on('click', function(e) {
    $('.collection-filter').css("left", "-15px");
});
$('.filter-back').on('click', function(e) {
    $('.collection-filter').css("left", "-365px");
    $('.sidebar-popup').trigger('click');
});
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
// if ($(".pr-slider")) {
//     $(".pr-slider").slick({
//         dots: true,
//         prevArrow: '<a class="slick-prev" href="#"> <i class="fa-solid fa-chevron-left"></i></a>',
//         nextArrow: '<a class="slick-next" href="#"> <i class="fa-solid fa-chevron-right"></i></a>',
//         customPaging: function(slick, index) {
//             var targetImage = slick.$slides.eq(index).find("img").attr("src");
//             return '<img src=" ' + targetImage + ' "/>';
//         },
//     });
// }