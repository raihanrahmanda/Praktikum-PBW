const icon = document.querySelector('.search-icon');
const search = document.querySelector('.ssearch');
icon.onclick = function () {
    search.classList.toggle('active')
}

// Function to perform live search
function searchNews() {
    var searchTerm = document.getElementById("mysearch").value;
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update the news container with the search results
                document.getElementById("news-container").innerHTML = xhr.responseText;
            } else {
                console.log("An error occurred.");
            }
        }
    };

    // Send the Ajax request to search-news.php
    xhr.open("GET", "news.php?term=" + searchTerm, true);
    xhr.send();
}

// Attach the search function to the keyup event of the search input field
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("mysearch").addEventListener("keyup", debounce(searchNews, 300));
});

// Helper function to debounce the search function
function debounce(func, delay) {
    let timeoutId;
    return function () {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(func, delay);
    };
}

function clearSearch() {
    document.getElementById('mysearch').value = '';
    searchCompetitions();
}

