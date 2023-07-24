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

/* cart page */

/* quantity handle */