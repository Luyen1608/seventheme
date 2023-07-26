const paymentCloseBtn = document.querySelector(".payment-close-btn");
const paymentOpenBtn = document.querySelector(".show-payment-info");

const addressBookCloseBtn = document.querySelector(".address-book-close-btn");
const addressBookOpenBtn = document.querySelector(".address-card-btn");
console.log(addressBookOpenBtn);
const shippingListCloseBtn = document.querySelector(".shipping-list-close-btn");
const shippingListOpenBtn = document.querySelector(
  ".change-ship.change"
);

paymentCloseBtn.onclick = () => {
  document.querySelector(".payment-info").classList.remove("active");
  console.log(1);
};
paymentOpenBtn.onclick = (e) => {
  e.stopPropagation();
  document.querySelector(".payment-info").classList.add("active");
};

document.querySelector(".payment-info-submit").onclick = () => {
  document.querySelector(".payment-info").classList.remove("active");
};

addressBookCloseBtn.onclick = () => {
  document.querySelector(".address-book").classList.remove("active");
};
addressBookOpenBtn.onclick = (e) => {
  console.log(1);
  document.querySelector(".address-book").classList.add("active");
};

shippingListCloseBtn.onclick = () => {
  document.querySelector(".shipping-list").classList.remove("active");
};
shippingListOpenBtn.onclick = (e) => {
  console.log(1);
  document.querySelector(".shipping-list").classList.add("active");
};


const addressBookAddBtn = document.querySelector('.address-book-actions .btn')
const addressCardAddBtn = document.querySelector('.add-card')
const addressCardAdd = document.querySelector('.address-book-card-add')
const addressBookAdd = document.querySelector('.address-book-address-add')
const addressCardAddCloseBtn1 = document.querySelector('.address-book-card-add-actions .submit')
const addressCardAddCloseBtn2 = document.querySelector('.address-book-card-add-actions .back')
const addressBookAddCloseBtn = document.querySelector('.address-book-address-add .submit')
const addAdDressCloseBtn = document.querySelector('.address-book-address-add-btn-close')
addressBookAddBtn.onclick =() => {
  addressBookAdd.classList.add('active')
  document.querySelector(".address-book").classList.remove("active");
}

addressCardAddBtn.onclick = () => {
  addressCardAdd.classList.add('active')
}
addressCardAddCloseBtn1.onclick = () => {
  addressCardAdd.classList.remove('active')

}
addressCardAddCloseBtn2.onclick = () => {
  addressCardAdd.classList.remove('active')

}
addressBookAddCloseBtn.onclick = () => {
  addressBookAdd.classList.remove('active')
}
addAdDressCloseBtn.onclick = () => {
  addressBookAdd.classList.remove('active')
}

document.querySelector('.address-book-address-add-header i').onclick = () => {
  document.querySelector(".address-book-address-add").classList.remove("active");

}
document.querySelector('.address-book-card-add-header i').onclick = () => {
  document.querySelector(".address-book-card-add").classList.remove("active");

}