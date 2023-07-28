// $(".filter-main-btn").append("<div class='cart-btn' data-content='10'><img src='assets/images/cart-2.svg' alt=''></div>");
$(document).ready(function() {
    $("body").append("<ul class='nk-sticky-toolbar'><li class='demo-purchase' data-content='2'><a href='/Cart'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none'>  <path d='M3.9 5.73333L5.08557 14.275C5.22282 15.2638 6.06825 16 7.06658 16L17.8334 16C18.8317 16 19.6772 15.2638 19.8144 14.275L20.7632 7.43955C20.8883 6.53778 20.1878 5.73333 19.2774 5.73333L3.9 5.73333ZM3.9 5.73333L3.60486 3.4136C3.50205 2.60558 2.81454 2 2 2V2' stroke='#F74239' stroke-width='1.5'/>  <path d='M9 20.5C9 19.6716 8.32843 19 7.5 19C6.67157 19 6 19.6716 6 20.5C6 21.3284 6.67157 22 7.5 22C8.32843 22 9 21.3284 9 20.5Z' stroke='#F74239' stroke-width='1.5'/>  <path d='M19 20.5C19 19.6716 18.3284 19 17.5 19C16.6716 19 16 19.6716 16 20.5C16 21.3284 16.6716 22 17.5 22C18.3284 22 19 21.3284 19 20.5Z' stroke='#F74239' stroke-width='1.5'/></svg></a></li></ul>");

});
function includeHTML() {
    var z, i, elmnt, file, xhttp;
    /* Loop through a collection of all HTML elements: */
    z = document.getElementsByTagName("*");
    for (i = 0; i < z.length; i++) {
      elmnt = z[i];
      /*search for elements with a certain atrribute:*/
      file = elmnt.getAttribute("w3-include-html");
      if (file) {
        /* Make an HTTP request using the attribute value as the file name: */
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
            if (this.status == 200) {elmnt.innerHTML = this.responseText;}
            if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
            /* Remove the attribute, and call this function once more: */
            elmnt.removeAttribute("w3-include-html");
            includeHTML();
          }
        }
        xhttp.open("GET", file, true);
        xhttp.send();
        /* Exit the function: */
        return;
      }
    }
  }




// <div class="btns-wrap only-mobile">
//             <div class="mobile-cate-btn">
//                 <div class="container-al">
//                     <i class="fa-solid fa-bars"></i>
//                 </div>
//             </div>

//             <div class="shopping-cart" data-content="3">
//                 <img src="./assets/images/Shipping.svg" alt="">
//             </div>
//             <a href="#" class="sign-in-btn btn-mobile"> Đăng nhập </a>
//             <a href="#" class="sign-up-btn btn-mobile"> Đăng ký </a>
//         </div>