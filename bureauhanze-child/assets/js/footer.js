function openPopup(id) {
    var e = document.getElementById(id);
    e.classList.toggle("active");
}




// open / close faq items
const openFaqContainer = document.querySelectorAll(".info__faq > .faq-item");
for(let i = 0; i < openFaqContainer.length; i++){
    openFaqContainer[i].onclick = function () {
        const faqContainerHasClass = openFaqContainer[i].classList.contains("active");
        if(faqContainerHasClass) {
            // console.log('has class');
            openFaqContainer[i].classList.remove("active");
        } else {
            for (let faqContainer of openFaqContainer) {
                faqContainer.classList.remove('active')
            }
            openFaqContainer[i].classList.add("active");
        };
    };
}





function closePopup(id) {
    var e = document.getElementById(id);
    e.classList.remove("active");
}

function openSpecs(id) {
    var e = document.getElementById(id);
    e.classList.toggle("active");
    
    var btntext = document.querySelector("#specsWrap > div.more__specs");
    if (btntext.innerHTML === "Minder specificaties") {
        btntext.innerHTML = 'Meer specificaties';
    } else {
        btntext.innerHTML = 'Minder specificaties';
    }
}

// function openFilters(id) {
//     var e = document.getElementById(id);
//     e.classList.toggle("active");

//     var filterDiv = document.querySelector(".product-category__filters");
//     var filterSVG = document.querySelector(".more-btn svg");
//     filterDiv.classList.toggle("--active");
//     filterSVG.classList.toggle("svg--active");
//     var btntext = document.querySelector(".more__specs");
//     if (btntext.innerHTML === "Filters verbergen") {
//         btntext.innerHTML = 'Filters weergeven';

//     } else {
//         btntext.innerHTML = 'Filters verbergen';
//     }
// }

// Set Cookie for popup
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*1*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

// Set Cookie for popup
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

// Hide popup if cookie is set
var popupCookie = getCookie('popupCookie');
if (popupCookie) {
    document.getElementById('can-i-help-popup').style.display="none"
}
else {
    document.getElementById('can-i-help-popup').style.display="block"
}

// Set Cookie on popup close
document.getElementById('can-i-help--close').onclick=function(){
    document.getElementById('can-i-help-popup').style.display="none";
    setCookie('popupCookie','popupCookievalue',7);
};



// Product Modal JS
const addToCartButton = document.querySelector(".composite_data > div > div.composite_button")
const productID = document.querySelector(".composite_data > div > div.composite_button > input[type=hidden]")

if (addToCartButton) {
    addToCartButton.addEventListener("click", function () {
        sessionStorage.setItem("productID", productID.value);
    })
}

if (window.sessionStorage.getItem('productID')) {
    const modalIdentifier = document.getElementById('popup-accessoires');
    const productModalStandard = document.getElementById('productAddedModalStandard')
    const productModalAdvanced = document.getElementById('productAddedModalAdvanced')

    if (!modalIdentifier) {
        productModalStandard.style.display = "block"
        productModalStandard.classList.add("fade-in-bottom")
    } else {
        productModalAdvanced.style.display = "block"
        productModalAdvanced.classList.add("fade-in-bottom")
    }

    sessionStorage.clear()
}

function closePAM() {
    const productModalStandard = document.getElementById('productAddedModalStandard')
    const productModalAdvanced = document.getElementById('productAddedModalAdvanced')

    productModalStandard.classList.remove("fade-in-bottom")
    productModalStandard.style.display = "none"

    productModalAdvanced.classList.remove("fade-in-bottom")
    productModalAdvanced.style.display = "none"

    sessionStorage.clear()
}




// window.addEventListener("load", function() {
//     // var priceSubmitBtn = document.querySelector('.facetwp-submit').innerHTML;
//     // priceSubmitBtn = "My new text!";
//     document.querySelector(".facetwp-submit").innerHTML = "I have changed!";
// });



// window.addEventListener('load', (event) => {
//     var productOptionBtns = document.querySelectorAll("component_option_thumbnail_tap");
//     // var productOptionBtnsArray = [...productOptionBtns];
//     var input = document.querySelector(".composite_data > div > div.compositeprice_wrapper > div.composite_price > p span");

	
// 		for (let i = 0; i < productOptionBtns.length; ++i) {
// 			// productOptionBtn[i].onclick = function () { 
//             productOptionBtns[i].addEventListener('click', function(event) {
//                 event.preventDefault();
//                 var result = input.innerText;
//                 var resultfix = result.replace(/,/g, '.');
//                 var resultcalc = (resultfix * 1.21).toFixed(2);
//                 var finalResult = resultcalc.replace('.', ',');
//                 if(result) {
//                     document.getElementById("incVATprice").innerHTML = finalResult;
//                     console.log(productOptionBtns[i]);
//                 }
//                 console.log(productOptionBtns[i]);
//             });
//         }

//     });
    // for (let productOptionBtn of productOptionBtnsArray) {
    //     productOptionBtn.addEventListener('click', function(event) {
    //         event.preventDefault();
    //         var result = input.innerText;
    //         var resultfix = result.replace(/,/g, '.');
    //         var resultcalc = (resultfix * 1.21).toFixed(2);
    //         var finalResult = resultcalc.replace('.', ',');
    //         if(result) {
    //             document.getElementById("incVATprice").innerHTML = finalResult;
    //             // console.log(productOptionBtn);
    //         }
    //         console.log(productOptionBtn);
    //         console.log('productOptionBtn');
    //     });
  
    // }
    // console.log(productOptionBtnsArray);  


// Form projectinrichting multistep
const formProjectinrichting = document.querySelector('.wpcf7-form');
const formStepBtnNext = document.getElementById('step__button-next');
const formStepOne = document.querySelector('.step__one');
const formStepTwo = document.querySelector('.step__two');
const formSubmit = document.querySelector('.wpcf7-submit');
// formStepTwo.style.display = "none";

// observer for waiting class to exist
function waitForElm(selector) {
    return new Promise(resolve => {
        if (document.querySelector(selector)) {
            return resolve(document.querySelector(selector));
        }

        const observer = new MutationObserver(mutations => {
            if (document.querySelector(selector)) {
                resolve(document.querySelector(selector));
                observer.disconnect();
            }
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    });
}

// show / hide multistep form
if(formProjectinrichting){
    formStepBtnNext.addEventListener('click', function (event) {
        formStepOne.style.display = "none";
        formStepTwo.style.display = "block";
    });
    
    formSubmit.addEventListener('click', function (event) {


        waitForElm('.invalid').then((elm) => {
            formStepOne.style.display = "block";
            formStepTwo.style.display = "block";
            formStepBtnNext.style.display = "none"
        });



        // setTimeout(function(){
        //     const formHasClassInvalid = formProjectinrichting.classList.contains('invalid');
        //     if(formHasClassInvalid) {
        //         formStepOne.style.display = "block";
        //         formStepTwo.style.display = "block";
        //         formStepBtnNext.style.display = "none"
        //     };
        // }, 2500);
    });
};




// document.addEventListener('DOMContentLoaded', function() {
//     // var el = document.querySelector('.facetwp-submit');
//     var el = document.querySelector('.filters__price');
//     var wrapper = document.createElement('span');
    
//     el.parentNode.insertBefore(wrapper, el);
//     wrapper.appendChild(el);
// }, false);


// const componentSelected = document.querySelector('.component_option_thumbnail');
// const componentSelectedClass = document.querySelector('.selected');
// const compositeAddToCart = document.querySelector('.composite_add_to_cart_button');
// // compositeAddToCart.setAttribute("pointer-events", "none");
// if(componentSelected.classList.contains(componentSelectedClass) ) {
//     console.log('test');

// }



// document.addEventListener("load", function(){
    // let nextBtn = document.getElementById('nextBtn');
    // let prevBtn = document.getElementById('prevBtn');
    // let elementIndex = document.querySelectorAll('.element_index');
    // if(nextBtn) {
    //     nextBtn.addEventListener('click', () => {
    //         var compositePagination = document.querySelectorAll('.element_index');
    //         for(let i = 0; i < compositePagination.length; i++) {
    //             console.log(compositePagination);
    //         }
    //     });
    // }



// });


window.addEventListener("load", function () {

    document.querySelector("div.component_inner > div.component_selections > div.component_content > .component_summary > .product")

    validateOptons();
    // listener for onclick of

    var loadMoreButtonC = document.getElementsByClassName('component_options_load_more')

    if (loadMoreButtonC[0]) {
        loadMoreButtonC[0].addEventListener("click", () => {
            setTimeout(() => {
                validateOptons();
            }, 2000)
        })
    }

    var productSummary = document.getElementsByClassName('product_summary')
    if (productSummary[0]) {
        productSummary[0].addEventListener("click", () => {
            validateOptons();
        })
    }
})





// // overlay active on mouse hover menu items
// const menuItems = document.querySelectorAll('.menu .menu-item');
// menuItems.forEach(f => f.addEventListener('mouseenter', function() {
//     menuItems.forEach(e => {
//         const overlayActive = document.getElementById('page-overlay')
//         overlayActive.classList.add('page-overlay--active');
//     // const bodyElement = document.body;
//     // bodyElement.classList.add("--menu-hover");
//   })
// }));
// menuItems.forEach(f => f.addEventListener('mouseout', function() {
//     menuItems.forEach(e => {
//     // const bodyElement = document.body;
//     // bodyElement.classList.remove("--menu-hover");
//     const overlayActive = document.getElementById('page-overlay')
//     overlayActive.classList.remove('page-overlay--active');
//   })
// }));



// append class to sub-menu
document.addEventListener('DOMContentLoaded', function() {
    var subMenu = document.querySelectorAll('.sub-menu')
    for(let i = 0; i < subMenu.length; i++){
        var subMenuDiv = document.createElement("div")
        subMenuDiv.className = "sub-menu__overlay";
        subMenu[i].appendChild(subMenuDiv)
    }
}, false);


function validateOptons() {

    performance.getEntriesByType("resource")

    const resources = performance.getEntriesByType("resource");

    resources.filter(resource => resource.name == "Rectangle-Copy-14.png")

    var aantalSubOpties = document.getElementsByClassName('component_option_thumbnails');


    const addToCartButton = document.querySelector("div > div.composite_button > .single_add_to_cart_button")

    var optionsCount = 0;
    var aantalSelected = 0;

    for (let single of aantalSubOpties) {
        let subOptiesChilds = single.children;

        optionsCount = optionsCount + 1;

        for (let optionOuter of subOptiesChilds) {
            let singleOption = optionOuter.children;
            var globalCount = 0;
            var activeClass = 0;

            for (let optionLi of singleOption) {
                globalCount = globalCount + 1;

                if (optionLi.children[0].classList.contains('selected')) {
                    activeClass = activeClass + 1;
                }
            }
            if (activeClass) {
                aantalSelected = aantalSelected + 1;
            }

        }
    }
    // only change styling of the add to cart button when there are much selected boxes as rows of options
    if (addToCartButton) {
        if (aantalSelected === optionsCount) {
            addToCartButton.style.opacity = 1;
            addToCartButton.style.pointerEvents = "all"
        } else {
            addToCartButton.style.opacity = .6;
            addToCartButton.style.pointerEvents = "none"
        }
    }
}





// const webshopMenu = document.querySelectorAll('.menu-webshop-container > .menu-item')
// const 

// for(let i = 0; i < webshopMenu.length; i++) {
//     webshopMenu[i].addEventListener("mouseenter", function( event ) {   
//         event.target.style.color = "purple";

//       }, false);
// }



