
// Nav
const pageOverlay = document.getElementById("page-overlay");
const navContainer = document.querySelector(".nav");
const openNav = document.getElementById("nav--open");
const closeNav = document.getElementById("nav--close");

// Nav init
function navClose(){
    pageOverlay.classList.remove("page-overlay--active");
    navContainer.classList.remove("nav--active");
}

// Open modal
function modalOpen(){
    modal.style.display = "block";
    pageOverlay.classList.remove("page-overlay");
    pageOverlay.classList.add("page-overlay--active");
}

// Modal init
function modalClose(){
    modal.style.display = "none";
    pageOverlay.classList.remove("page-overlay--active");
    pageOverlay.classList.add("page-overlay");
}

// When the user clicks on the button, open the nav
openNav.onclick = function () {
    pageOverlay.className += " page-overlay--active";
    navContainer.className += " nav--active";
};

// When the user clicks on [ X ], close the nav
closeNav.onclick = function () {
    navClose();
};

// Modals
const modal = document.querySelector(".modal");
const openModal = document.querySelectorAll(".open-modal");
const closeModal = document.querySelectorAll(".close-modal");
for(let i = 0; i < openModal.length; i++){
    // When the user clicks on the button, open the modal
    openModal[i].onclick = function () {
        modalOpen();
    };
    // When the user clicks on <span> (x), close the modal
    for(let y = 0; y < closeModal.length; y++){

        closeModal[y].onclick = function () {
            modalClose();
        };
    }
}


// When the user clicks anywhere outside of the nav modal, close it
window.onclick = function (event) {
    if (event.target == pageOverlay) {
        navClose();
        modalClose();
    }
};

// Scroll to top
function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
}

// Sticky header
window.onscroll = function() {stickyHeader()};
const header = document.getElementById("main__header");
const sticky = header.offsetTop;
function stickyHeader() {
   if (window.pageYOffset > sticky) {
     header.classList.add("--sticky");
   } else {
     header.classList.remove("--sticky");
   }
}

// Add active class on current link
function highlightCurrent() {
    const curPage = document.URL;
    const links = document.getElementsByTagName('a');
    for (let link of links) {
        if (link.href == curPage) {
        link.classList.add("--active");
        }
    }
}
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        highlightCurrent()
    }
};

// Fiter blog items
filterSelectionBlog("all")
function filterSelectionBlog(c) {
  var x, i;
  x = document.getElementsByClassName("type-blog");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}
// Show filtered elements
function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
        element.className += " " + arr2[i];
        }
    }
}
// Hide elements that are not selected
function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

// add --active class on mobile menu items when clicked
window.onload = () => {
    var mobileMenuItems = document.querySelectorAll('.menu-item a');
    for (var i = 0; i < mobileMenuItems.length; i++) {
        mobileMenuItems[i].addEventListener('click', function(){
            this.classList.toggle('--active')
        });
    }
};
