const dateInputs = document.querySelectorAll('input[type="date"]');

dateInputs.forEach(input => {
    input.addEventListener('input', function () {
        const inputValue = input.value;

        if (inputValue.length > 0) {
            input.style.color = 'black';
        } else {
            input.style.color = 'white';
        }
    });
});

const textarea = document.querySelector("textarea");
textarea.addEventListener("keyup", e => {
    textarea.style.height = "22px";
    let scHeight = e.target.scrollHeight;
    textarea.style.height = `${scHeight}px`;
});
