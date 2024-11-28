const cartDetailCollapseBtn = document.querySelector(
  ".cart-detail-collapse-btn"
);
const cartDetailContent = document.querySelector(".cart-detail-content");
cartDetailCollapseBtn.onclick = (e) => {
  e.target.classList.toggle("active");
  cartDetailContent.classList.toggle("active");
};

const cartSectionCollapseBtn = document.querySelectorAll(
  ".cart-content .cart-section-heading .collapse-btn"
);
const cartSectionContents = document.querySelectorAll(".cart-section-content");
const collapseContent = ["Thu gọn", "Mở rộng"]
cartSectionCollapseBtn.forEach((item, i) => {
  item.onclick = () => {
    item.querySelector('i').classList.toggle('active')
    console.log(item.querySelector('span').innerText == 'Thu gọn');
    if(item.querySelector('span').innerText ==  'Thu gọn'){
      item.querySelector('span').innerText = 'Mở rộng'
    } else{
      item.querySelector('span').innerText = 'Thu gọn'
    }
    cartSectionContents[i].classList.toggle("active");
  };
});
