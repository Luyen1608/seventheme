const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const product = urlParams.get('rating')

var elementExists = document.getElementById("danhgia");
if (product == 1 && elementExists != null) {
  $('#inputRating').addClass('show');
  $('html, body').animate({
    scrollTop: $("#danhgia").offset().top - 100
  }, 1000);


  // var myElement = document.getElementById('inputRating');
  // // var topPos = myElement.offsetTop;
  // // $('body').scrollTop = topPos;
  // // $.scroll(0, topPos);
  // elementExists.scrollIntoView(true);

}

