
$(document).ready(function() {
    addNavMenuMobile();
    
const slider = document.querySelector(".slider");
const nextBtn = document.querySelector(".next-btn");
const prevBtn = document.querySelector(".prev-btn");
const mobileOverlay = document.querySelector(".mobile-overlay");
const select = document.querySelector(".returns-link .text");
const optionList = document.querySelector(".option-list");
const optionItems = document.querySelectorAll(".option-item");


const mobileCateBtn = document.querySelector(".mobile-cate-btn");
const mobileCate = document.querySelector(".mobile-categories");
mobileCateBtn.onclick = (e) => {
    mobileCate.classList.toggle("active");
    mobileOverlay.classList.toggle("active");
};

/* mobileCate.onclick = () => {
  mobileCate.classList.add('active')
} */

const items = document.querySelectorAll(".list .item:nth-child(5n)");
items.forEach((item) => {
    item.classList.add("width-100");
});

const mobileDropdown = document.querySelectorAll(
    ".mobile-categories ul > .dropdown"
);

mobileDropdown.forEach((item) => {
    item.onclick = (e) => {
        e.stopPropagation();
        item.querySelector(".sub-dropdown").classList.toggle("active");
        item.querySelector("i").classList.toggle("active");
    };
});

const mobileSubDropdown = document.querySelectorAll(
    ".mobile-categories  .lv2-dropdown"
);

mobileSubDropdown.forEach((item) => {
    item.onclick = (e) => {
        e.stopPropagation();
        item.querySelector(".lv2-sub-dropdown").classList.toggle("active");
        item.querySelector("i").classList.toggle("active");
    };
});

const lv2Dropdown = document.querySelectorAll(".categories  .lv2-dropdown");

lv2Dropdown.forEach((item) => {
    item.onclick = (e) => {
        e.stopPropagation();
        item.querySelector(".lv2-sub-dropdown").classList.toggle("active");
        item.style.height = "100%";
    };
});

mobileOverlay.onclick = () => {
    mobileCate.classList.remove("active");
    mobileOverlay.classList.remove("active");
};

optionItems.forEach((item) => {
    item.onclick = () => {
        select.innerHTML = item.innerHTML;
        optionItems.forEach((i) => {
            i.classList.remove("active");
        });
        item.classList.add("active");
    };
});
      
});


function addNavMenuMobile(){
    $("body").append("<div class='btns-wrap only-mobile'> " + 
    "<div class='mobile-cate-btn'> " + 
    "<div class='container'> " + 
    "<i class='fa-solid fa-bars'></i> " + 
    "</div> " + 
    "</div> " + 
    " <div class='shopping-cart' data-content='3'> " + 
    " <svg xmlns='http://www.w3.org/2000/svg' width='18' height='19' viewBox='0 0 18 19' fill='none'> " + 
    "  <path d='M2.4125 4.01667L3.41994 11.275C3.55719 12.2638 4.40263 13 5.40095 13L14.3865 13C15.3849 13 16.2303 12.2638 16.3676 11.275L17.1382 5.72289C17.2633 4.82111 16.5628 4.01667 15.6524 4.01667L2.4125 4.01667ZM2.4125 4.01667L2.15425 1.9869C2.06429 1.27988 1.46272 0.75 0.75 0.75V0.75' stroke='var(--style-color-main)' stroke-width='1.5'/> " + 
    " <path d='M6.875 16.9375C6.875 16.2126 6.28737 15.625 5.5625 15.625C4.83763 15.625 4.25 16.2126 4.25 16.9375C4.25 17.6624 4.83763 18.25 5.5625 18.25C6.28737 18.25 6.875 17.6624 6.875 16.9375Z' stroke='var(--style-color-main)' stroke-width='1.5'/> " + 
    " <path d='M15.625 16.9375C15.625 16.2126 15.0374 15.625 14.3125 15.625C13.5876 15.625 13 16.2126 13 16.9375C13 17.6624 13.5876 18.25 14.3125 18.25C15.0374 18.25 15.625 17.6624 15.625 16.9375Z' stroke='var(--style-color-main)' stroke-width='1.5'/> " + 
    "  </svg> " + 
    "</div> " + 
    "<a href='#' class='sign-in-btn btn-mobile'> Đăng nhập </a> " + 
    "<a href='#' class='sign-up-btn btn-mobile'> Đăng ký </a> " + 
    "</div> " + 
    "<div class='mobile-categories'> " + 
    "<div class='container-al'> " + 
    "<ul class='mobile-categories-list'> " + 
    "       <li><span>Trang chủ</span></li> " + 
    "       <li class='dropdown' aria-controls='sd-1' " + 
    "           aria-expanded='true'> " + 
    "           <span> Sản phẩm <i class='fa-solid fa-chevron-down'></i> " + 
    "           </span> " + 
    "           <ul class='sub-dropdown' id='sd-1'> " + 
    "               <li><a href='#'>1 Hello world</a></li> " + 
    "               <li><a href='#'>2 Hello world</a></li> " + 
    "               <li><a href='#'>3 Hello world</a></li> " + 
    "           </ul> " + 
    "       </li> " + 
    "       <li><span> Chào hàng </span></li> " + 
    "       <li><span> Doanh nghiệp </span></li> " + 
    "       <li class='dropdown'> " + 
    "           <span> Tin tức <i class='fa-solid fa-chevron-down'></i> " + 
    "           </span> " + 
    "           <ul class='sub-dropdown'> " + 
    "               <li class='lv2-dropdown'> " + 
    "                   <span> " + 
    "                       Giới thiệu tổng quan sàn<i " + 
    "                           class='fa-solid fa-chevron-down'></i> " + 
    "                   </span> " + 
    "                   <ul class='lv2-sub-dropdown'> " + 
    "                       <li><a href='#'>Thị trường quốc tế</a></li> " + 
    "                       <li><a href='#'>Mỹ</a></li> " + 
    "                       <li><a href='#'>Nhật Bản</a></li> " + 
    "                   </ul> " + 
    "               </li> " + 
    "               <li><a href='#'>2 Hello world</a></li> " + 
    "               <li><a href='#'>3 Hello world</a></li> " + 
    "           </ul> " + 
    "       </li> " + 
    "       <li><span> Quảng cáo </span></li> " + 
    "       <li class='dropdown'> " + 
    "           <span> " + 
    "               Hướng dẫn mua bán<i " + 
    "                   class='fa-solid fa-chevron-down'></i> " + 
    "           </span> " + 
    "           <ul class='sub-dropdown'> " + 
    "               <li class='lv2-dropdown'> " + 
    "                   <span> " + 
    "                       1 Hello world<i " + 
    "                           class='fa-solid fa-chevron-down'></i> " + 
    "                   </span> " + 
    "                   <ul class='lv2-sub-dropdown'> " + 
    "                       <li><a href='#'>Thị trường quốc tế</a></li> " + 
    "                       <li><a href='#'>Mỹ</a></li> " + 
    "                       <li><a href='#'>Nhật Bản</a></li> " + 
    "                   </ul> " + 
    "               </li> " + 
    "               <li><a href='#'>2 Hello world</a></li> " + 
    "               <li><a href='#'>3 Hello world</a></li> " + 
    "           </ul> " + 
    "       </li> " + 
    "   </ul> " + 
    "</div> " + 
    "</div> " + 
    "<div class='mobile-overlay'></div>");
  }
  
  function switch_noti() {
    var element = document.getElementById("notifi");
    element.classList.toggle("notifi_show");
    } 
/* cart page */

/* quantity handle */
