import 'bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';

/* ===================================
   CHAPTER 19B - PRODUCT GALLERY
=================================== */

window.changeImage = function (element) {

    const mainImage = document.getElementById('mainImage');

    if (!mainImage) return;

    // Smooth Fade Out
    mainImage.style.opacity = "0";

    setTimeout(() => {

        mainImage.src = element.src;

        mainImage.style.opacity = "1";

    }, 180);

    // Remove Active State
    document.querySelectorAll('.thumbnail-item').forEach(item => {

        item.classList.remove('active');

    });

    // Add Active State
    element.parentElement.classList.add('active');

};

// Highlight First Thumbnail After Page Load
document.addEventListener("DOMContentLoaded", () => {

    const firstThumb = document.querySelector(".thumbnail-item");

    if (firstThumb) {

        firstThumb.classList.add("active");

    }

});


/* ===================================
   Chapter 19C - Quantity
=================================== */

document.addEventListener("DOMContentLoaded", () => {

    const qtyValue = document.getElementById("qtyValue");
    const minus = document.getElementById("qtyMinus");
    const plus = document.getElementById("qtyPlus");

    if (!qtyValue || !minus || !plus) return;

    let qty = 1;

    plus.addEventListener("click", () => {

        qty++;

        qtyValue.textContent = qty;

    });

    minus.addEventListener("click", () => {

        if(qty > 1){

            qty--;

            qtyValue.textContent = qty;

        }

    });

});


/* ===================================
   Chapter 19C - Wishlist
=================================== */

document.addEventListener("DOMContentLoaded", () => {

    const wishlist = document.getElementById("wishlistBtn");

    const icon = document.getElementById("wishlistIcon");

    if(!wishlist) return;

    wishlist.addEventListener("click", () => {

        wishlist.classList.toggle("active");

        if(wishlist.classList.contains("active")){

            icon.textContent = "❤";

        }else{

            icon.textContent = "♡";

        }

    });

});