
//smoth scrolling

$(document).ready(function () {
  // Add smooth scrolling to all links
  $("a").on('click', function (event) {
    

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 500, function () {

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});


/// end smoth scolling



//Get scroll  button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

//Scroll button


//ScrollReveal().reveal('.section-2', {delay : 500});



 var swiper = new Swiper(".swiper-container", {
     slidesPerView: 1,
     spaceBetween: 10,
     // init: false,
     pagination: {
         el: ".swiper-pagination",
         clickable: true,
     },
     autoplay: {
         delay: 2500,
         disableOnInteraction: false,
     },

     breakpoints: {
         "@0.00": {
             slidesPerView: 1,
             spaceBetween: 10,
         },
         "@0.75": {
             slidesPerView: 1,
             spaceBetween: 10,
         },
         "@1.00": {
             slidesPerView: 2,
             spaceBetween: 10,
         },
         "@1.50": {
             slidesPerView: 3,
             spaceBetween: 10,
         },
         "@2.00": {
             slidesPerView: 4,
             spaceBetween: 10,
         },
     },
 });
