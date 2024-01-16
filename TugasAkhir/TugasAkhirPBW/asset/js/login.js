function showHidePW() {
    var x = document.getElementById("myInput");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

    if (x.type === "password") {
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    } else {
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}

function scrollToClass(className) {
    const element = document.querySelector(`.${className}`);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
    }
}

ScrollReveal({
    //reset: true,
    distance: '60px',
    duration: 2500,
    delay: 400
});

//target elements, and specify options to create reveal animations
ScrollReveal().reveal('.about-us-1 .image-box', { delay: 500, origin: 'left' });
ScrollReveal().reveal('.about-us-1 .text-box', { delay: 500, origin: 'right' });
ScrollReveal().reveal('.about-us-2 .image-box', { delay: 500, origin: 'right' });
ScrollReveal().reveal('.about-us-2 .text-box', { delay: 500, origin: 'left' });
ScrollReveal().reveal('.about-us-3 .image-box', { delay: 500, origin: 'left' });
ScrollReveal().reveal('.about-us-3 .text-box', { delay: 500, origin: 'right' });

ScrollReveal().reveal('.logo-section', { delay: 500, origin: 'left' });
ScrollReveal().reveal('.supported-by', { delay: 500, origin: 'bottom' });
ScrollReveal().reveal('.contact-section', { delay: 500, origin: 'right' });