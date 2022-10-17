var top1 = false
var bottom = false

function descPress() {
    var description = document.getElementById('description');
    var arrow = document.querySelector(".tab_info");
    top1 = !top1

    if (top1) {
        description.classList.add("showDesc");
        arrow.classList.add("rotateArrow");
    } else {
        arrow.classList.remove("rotateArrow");
        description.classList.remove("showDesc")
    }
}

function extraPress() {
    var description = document.getElementById('additional');
    var arrow = document.querySelector(".tab_info:nth-child(2)");
    bottom = !bottom;

    if (bottom) {
        arrow.classList.add("rotateArrow");
        description.classList.add("showDesc");
    } else {
        arrow.classList.remove("rotateArrow");
        description.classList.remove("showDesc");
    }
}

// Minus and Plus buttons quantity

jQuery(document).ready(function($){

    $('form.cart').on( 'click', 'button.plus, button.minus', function() {

    // Get current quantity values
    var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
    var val   = parseFloat(qty.val());
    var max = parseFloat(qty.attr( 'max' ));
    var min = parseFloat(qty.attr( 'min' ));
    var step = parseFloat(qty.attr( 'step' ));

    // Change the value if plus or minus
    if ( $( this ).is( '.plus' ) ) {
       if ( max && ( max <= val ) ) {
          qty.val( max );
       }
    else {
       qty.val( val + step );
         }
    }
    else {
       if ( min && ( min >= val ) ) {
          qty.val( min );
       }
       else if ( val > 1 ) {
          qty.val( val - step );
       }
    }

 });

});


// Ajax quantity add

var timeout;

jQuery( function( $ ) {
	$('.woocommerce').on('change', 'input.qty', function(){

		if ( timeout !== undefined ) {
			clearTimeout( timeout );
		}

		timeout = setTimeout(function() {
			$("[name='update_cart']").trigger("click");
		}, 500 ); // 0.5 second delay

	} );
} );


// getting all input fields & progress line
const voornaam = document.getElementById('billing_first_name')
const shipVoornaam = document.getElementById('shipping_first_name')
const achternaam = document.getElementById('billing_last_name')
const shipAchternaam = document.getElementById('shipping_last_name')
const straat = document.getElementById('billing_address_1')
const shipStraat = document.getElementById('shipping_address_1')
const postcode = document.getElementById('billing_postcode')
const shipPostcode = document.getElementById('shipping_postcode')
const plaats = document.getElementById('billing_city')
const shipPlaats = document.getElementById('shipping_city')
const email = document.getElementById('billing_email')
const phone = document.getElementById('billing_phone')
const line = document.getElementById('tussen1-2');
const errorMessage = document.getElementById('formValidation');
const diffrentAdress = document.getElementById('ship-to-different-address-checkbox');



var progress = 12.5;
if (line) {
    line.style.width = progress + "%";
}

// putting the inputs in an array
allInputs = [voornaam, achternaam, straat, postcode, plaats, email, phone]

allInputs.forEach(checkInput);
var proceed = false;


function checkInput(value) {
    if (value) {
        if (value.value) {
            progress = progress + 12.5;
            line.style.width = progress + "%";
            value.proceed = true;
        }


        value.addEventListener('change', (event) => {

            if (value.value && !value.proceed) {
                progress = progress + 12.5;
                line.style.width = progress + "%";
                value.proceed = true;
            } else if(value.value && value.proceed) {
                // do nothing
            } else {
                progress = progress -12.5;
                line.style.width = progress + "%";
                value.proceed = false;
            }
        });
    }
}
var shipVerder = false;
if (diffrentAdress) {
    diffrentAdress.addEventListener('change', function() {
        shipVerder = !shipVerder;
    })
}

function nextStepCheckout() {
    var verder = true;
    if (shipVerder) {
        if (!shipVoornaam.value || !shipAchternaam.value || !shipStraat.value || !shipPostcode.value || !shipPlaats.value) {
            verder = false;
        }
    } else if (!voornaam.value || !achternaam.value || !straat.value || !postcode.value || !plaats.value || !email.value || !phone.value) {
        verder = false;
    }

    if (verder) {
        var step1_content = document.getElementById("checkout_step1");
        var step2_content = document.getElementById("checkout_step2");

        var afgerond = document.getElementById("stap1");
        var meeBezig = document.getElementById("stap2");

        var lijn1_2 = document.getElementById("tussen1-2");

        lijn1_2.style.width = "100%";
        if (meeBezig || afgerond) {
            meeBezig.classList.add("active-class");
            afgerond.classList.add("done-class");
        }


        window.scrollTo(0, 50);

        step1_content.style.display = "none";
        step2_content.style.display = "block";
        errorMessage.style.display = "none";
    } else {
        errorMessage.style.height = "fit-content";
        errorMessage.style.opacity = 1;
        errorMessage.style.marginBottom = "40px";
        errorMessage.style.padding = "5px 25px";
    }
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


// Add incVAT price that changes with the composite price

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

// Show total price for accessoires
function productTotal() {
    var input = document.querySelector(".composite_data > div > div.compositeprice_wrapper > div.composite_price > p span");
    var productTotals = document.querySelector("#productTotals");
    if (input) {
        var result = input.innerText;
    }
    if (productTotals) {
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

//Timed out function for VAT Price for Accessoires
function incVATtime() {
    setTimeout(incVAT, 500);
}


//Interval for totalprice Accessoires box
var productPrice = document.getElementById('priceWatch');

if (productPrice) {
    setInterval(productTotal, 1000)
}