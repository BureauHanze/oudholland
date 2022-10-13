// Ajax quantity add

var timeout;

jQuery(function ($) {
    $('.woocommerce').on('change', 'input.qty', function () {
        if (timeout !== undefined) {
            clearTimeout(timeout);
        }
        timeout = setTimeout(function () {
            $("[name='update_cart']").trigger("click");
        }, 500); // 0.5 second delay
    });
});


// Checkout steps

setTimeout(() => {
    var meeBezig = document.getElementById("stap1");
    if (meeBezig) {
        meeBezig.classList.add("active-class");
    }
}, 200);

function nextStepCheckout() {
    var step1_content = document.getElementById("checkout_step1");
    var step2_content = document.getElementById("checkout_step2");

    var afgerond = document.getElementById("stap1");
    var meeBezig = document.getElementById("stap2");

    var lijn1_2 = document.getElementById("tussen1-2");

    lijn1_2.style.width = "100%";
    meeBezig.classList.add("active-class");
    afgerond.classList.add("done-class");

    window.scrollTo(0, 50);

    step1_content.style.display = "none";
    step2_content.style.display = "block";
}

function previousStep() {
    var step1_content = document.getElementById("checkout_step1")
    var step2_content = document.getElementById("checkout_step2")

    var stap1 = document.getElementById("stap1")
    var stap2 = document.getElementById("stap2")
    window.scrollTo(0, 0);

    step1_content.style.display = "block";
    step2_content.style.display = "none";

    step1_content.style.display = "block";
    step2_content.style.display = "none";
}


// Open product modal
function productModal(productTitle, productLink, productImgUrl) {
    // gets inner and outer modals
    var theModal = document.getElementById("productModal");
    var theModalInner = document.getElementById("productModalInner");

    // changes the html with the new parameter data inside of it
    document.getElementById('imgWrapper').innerHTML = '<a href="' + productLink + '"><img class="modalProductImage" src="' + productImgUrl + '"/></a>';
    document.getElementById("productTitle").innerHTML = productTitle;

    // adds the active class to the modal
    theModal.classList.add('modal__cart--active');
    // theModalInner.classList.add('product_modal-animation');

    pageOverlay.classList.remove("page-overlay");
    pageOverlay.classList.add("page-overlay--active");
}

// Close product modal
function closeProductModal() {
    // grabs modal by the id and then remove the active class
    var theModal = document.getElementById("productModal");
    theModal.classList.remove('modal__cart--active');

    pageOverlay.classList.remove("page-overlay--active");
    pageOverlay.classList.add("page-overlay");
}


// BEGIN listeners to price
setTimeout(function () {
    var productPrice = document.getElementById('priceWatch')
    if (productPrice) {
        var productSelections = document.querySelectorAll('select')
        if (productSelections) {
            productSelections.forEach(selection => {
                selection.addEventListener('change', function () {
                    setTimeout(incVAT, 500);
                })
            })
        }
        window.addEventListener('click', function () {
            setTimeout(incVAT, 500);
        })
    }
}, 600);

// Show incVAT price for product
function incVAT() {
    var input1 = document.querySelector(".composite_data > div > div.compositeprice_wrapper > div.composite_price > p span");

    if (input1) {
        var result = input1.innerText;
        var resultfix = result.replace(/,/g, '.');
        var resultcalc = (resultfix * 1.21).toFixed(2);
        var finalResult = resultcalc.replace('.', ',');
        document.getElementById("incVATprice").innerHTML = finalResult;
    }
}

// Show total price for accessoires
function productTotal() {
    var input = document.querySelector(".composite_data > div > div.compositeprice_wrapper > div.composite_price > p span");

    if (input) {
        var result = input.innerText;
    }
    if (result) {
        document.querySelector("#productTotals").innerHTML = result;
    }
}

window.addEventListener('load', (event) => {
    setTimeout(productTotal, 100);
    setTimeout(incVAT, 600);

    var radioButtons = document.querySelectorAll('.radio_button');

    if (radioButtons) {
        radioButtons.forEach(button => {
            button.addEventListener('click', function () {
                incVAT();
                setTimeout(function () {
                    productTotal()
                    watchSelections()
                }, 1300)
            }, {
                once: false
            })
        })
    }

});


function watchSelections() {
    var dropdownSelections = document.querySelectorAll('.variations select, .quantity input')
    if (dropdownSelections) {
        dropdownSelections.forEach(element => {
            element.addEventListener('change', function () {
                incVAT();
                setTimeout(productTotal, 600)
            })
        })
    }
}

//Timed out function for VAT Price for Accessoires

function incVATtime() {
    setTimeout(incVAT, 500);
}