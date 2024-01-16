const othersCheckbox = document.getElementById('othersCheckbox');
const othersText = document.getElementById('othersText');

othersCheckbox.addEventListener('change', function () {
    if (othersCheckbox.checked) {
        othersText.disabled = false;
        othersText.value = ""; // Clear the input field
        othersText.placeholder = "Enter custom skill";
    } else {
        othersText.disabled = true;
        othersText.value = "Others"; // Reset the value to "Others"
        othersText.placeholder = "Others";
    }
});

// function toggleOthersText() {
//     var othersCheckbox = document.getElementById("othersCheckbox");
//     var othersText = document.getElementById("othersText");

//     if (othersCheckbox.checked) {
//         othersText.disabled = false;
//         othersText.value = ""; // Clear the input field
//         othersText.placeholder = "Enter custom skill";
//     } else {
//         othersText.disabled = true;
//         othersText.value = "Others"; // Reset the value to "Others"
//         othersText.placeholder = "Others";
//     }
// }