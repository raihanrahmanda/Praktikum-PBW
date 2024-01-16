const icon = document.querySelector('.search-icon');
const search = document.querySelector('.ssearch');
icon.onclick = function () {
    search.classList.toggle('active')
}

function togglePopup(idname) {
    document.getElementById(idname).classList.toggle("active");
}

function searchCompetitions() {
    var searchInput = document.getElementById('mysearch').value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'competitions.php?keyword=' + searchInput, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementsByClassName('content')[0].innerHTML = xhr.responseText;
            // Reinitialize the popup functionality
            initializePopups();
        }
    };
    xhr.send();
}

// Function to initialize the popup functionality
function initializePopups() {
    var popupTriggers = document.getElementsByClassName('competition-image');
    var overlays = document.getElementsByClassName('overlay');
    var closeButtons = document.getElementsByClassName('close-btn');

    // Attach event listeners to each popup trigger
    for (var i = 0; i < popupTriggers.length; i++) {
        (function (index) {
            popupTriggers[index].addEventListener('click', function () {
                togglePopup('popup-' + index);
            });
            overlays[index].addEventListener('click', function () {
                togglePopup('popup-' + index);
            });
            closeButtons[index].addEventListener('click', function () {
                togglePopup('popup-' + index);
            });
        })(i);
    }
}

function clearSearch() {
    document.getElementById('mysearch').value = '';
    searchCompetitions();
}