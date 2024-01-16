var acc = document.getElementsByClassName("accordion");
var i;
var len = acc.length;
for (i = 0; i < len; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
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

ScrollReveal().reveal('.logo-section', { delay: 500, origin: 'left' });
ScrollReveal().reveal('.supported-by', { delay: 500, origin: 'bottom' });
ScrollReveal().reveal('.contact-section', { delay: 500, origin: 'right' });