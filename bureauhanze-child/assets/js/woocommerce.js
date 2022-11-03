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


// getting all input consts for the checkout process
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
const bedrijf = document.getElementById('billing_company')
const shipBedrijf = document.getElementById('shipping_company')

const differentAdress = document.getElementById('ship-to-different-address-checkbox');
const errorMessage = document.getElementById('formValidation');
const stepWrap = document.getElementById('checkoutWrap');
const checkStep1 = document.getElementById('stap1');
const checkStep2 = document.getElementById('stap2');
const checkStep3 = document.getElementById('stap3');
const checkStep4 = document.getElementById('stap4');


function nextStepCheckout(currentStep) { // Makes the 'Next' button work in checkout

    var verder = true;
    if (!voornaam.value || !achternaam.value || !straat.value || !postcode.value || !plaats.value || !email.value || !phone.value) {
        verder = false;
    }
    
    var verderShip = true;
    if(!shipVoornaam.value || !shipAchternaam.value || !shipStraat.value || !shipPostcode.value || !shipPlaats.value ) {
        verderShip = false;
    }

    if(currentStep) {
        formValidation.classList.remove('active');
        if(currentStep == '1') {
            if(verder) {
                stepWrap.classList.add('step_2');

                checkStep1.classList.add('done');
                checkStep1.classList.remove('current');
                checkStep2.classList.add('current');
            } else {
                formValidation.classList.add('active');
            }
        }
        if(currentStep == '2') {
            if(verderShip || !differentAdress.checked) {
                stepWrap.classList.add('step_3');

                checkStep2.classList.add('done');
                checkStep2.classList.remove('current');
                checkStep3.classList.add('current');
            } else {
                formValidation.classList.add('active');
            }
        }
        if(currentStep == '3') {
            stepWrap.classList.add('step_4');

            checkStep3.classList.add('done');
            checkStep3.classList.remove('current');
            checkStep4.classList.add('current');
        }
    }
    orderInfo();
    scrollTop();
}


function prevStepCheckout(currentStep) {  // Makes the 'Previous' button work in checkout

    if(currentStep) {
        if(currentStep == '2') {
            stepWrap.classList.remove('step_2');
            stepWrap.classList.remove('step_3');
            stepWrap.classList.remove('step_4');

            checkStep1.classList.remove('done');
            checkStep2.classList.remove('done');
            checkStep3.classList.remove('done');
            checkStep2.classList.remove('current');
            checkStep3.classList.remove('current');
            checkStep4.classList.remove('current');

            checkStep1.classList.add('current');
        }
        if(currentStep == '3' && !stepWrap.classList.contains('step_4')) {
            stepWrap.classList.remove('step_3');
            
            checkStep3.classList.remove('done');
            checkStep3.classList.remove('current');
            checkStep4.classList.remove('current');

            checkStep2.classList.remove('done');
            checkStep2.classList.add('current');
        }

        if(currentStep == '3' && stepWrap.classList.contains('step_4')) {
            stepWrap.classList.remove('step_4');

            checkStep4.classList.remove('current');

            checkStep3.classList.remove('done');
            checkStep3.classList.add('current');
        }
    }
    orderInfo();
    scrollTop();
}

function navStepCheckout(currentStep) { // Makes the steps clickable

    var verder = true;
    
    if (!voornaam.value || !achternaam.value || !straat.value || !postcode.value || !plaats.value || !email.value || !phone.value) {
        verder = false;
    }
    
    if(currentStep == '1') {
        stepWrap.classList.remove('step_2');  
        stepWrap.classList.remove('step_3');  
        stepWrap.classList.remove('step_4');

        stepWrap.classList.add('step_1');

        checkStep1.classList.add('current');
        
        checkStep2.classList.remove('current');
        checkStep2.classList.remove('done');
        checkStep3.classList.remove('current');
        checkStep3.classList.remove('done');
        checkStep4.classList.remove('current');
        checkStep4.classList.remove('done');
    }

    if(verder) {

        if(currentStep == '2') {
            stepWrap.classList.remove('step_1');
            stepWrap.classList.remove('step_3');
            stepWrap.classList.remove('step_4');

            stepWrap.classList.add('step_2');

            checkStep1.classList.add('done');
            checkStep2.classList.add('current');

            checkStep3.classList.remove('current');
            checkStep3.classList.remove('done');
            checkStep4.classList.remove('current');
            checkStep4.classList.remove('done');
        } 

        if(currentStep == '3') {
            stepWrap.classList.remove('step_1');
            stepWrap.classList.remove('step_2');  
            stepWrap.classList.remove('step_4');  

            stepWrap.classList.add('step_3'); 

            checkStep1.classList.add('done');
            checkStep2.classList.add('done');
            checkStep3.classList.add('current');

            checkStep4.classList.remove('current');
            checkStep4.classList.remove('done');
        } 

        if(currentStep == '4') {
            stepWrap.classList.remove('step_1');
            stepWrap.classList.remove('step_2');  
            stepWrap.classList.remove('step_3');  

            stepWrap.classList.add('step_4');  
            
            checkStep1.classList.add('done');
            checkStep2.classList.add('done');
            checkStep3.classList.add('done');
            checkStep4.classList.add('current');
        } 

    } else {
        formValidation.classList.add('active');
    }
    orderInfo();
    scrollTop();
}


function orderInfo() {
    // General info
    document.getElementById("firstname").innerHTML = voornaam.value;
    document.getElementById("lastname").innerHTML = achternaam.value;
    document.getElementById("company").innerHTML = bedrijf.value;
    document.getElementById("street").innerHTML = straat.value;
    document.getElementById("zipcode").innerHTML = postcode.value;
    document.getElementById("city").innerHTML = plaats.value;
    document.getElementById("phone").innerHTML = phone.value;
    document.getElementById("email").innerHTML = email.value;
    // Shipping info
    if(differentAdress.checked) {
        document.getElementById("shipfirstname").innerHTML = shipVoornaam.value;
        document.getElementById("shiplastname").innerHTML = shipAchternaam.value;
        document.getElementById("shipcompany").innerHTML = shipBedrijf.value;
        document.getElementById("shipstreet").innerHTML = shipStraat.value;
        document.getElementById("shipzipcode").innerHTML = shipPostcode.value;
        document.getElementById("shipcity").innerHTML = shipPlaats.value;
    } else {
        document.getElementById("shipfirstname").innerHTML = voornaam.value;
        document.getElementById("shiplastname").innerHTML = achternaam.value;
        document.getElementById("shipcompany").innerHTML = bedrijf.value;
        document.getElementById("shipstreet").innerHTML = straat.value;
        document.getElementById("shipzipcode").innerHTML = postcode.value;
        document.getElementById("shipcity").innerHTML = plaats.value;
    }
}


function scrollTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
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