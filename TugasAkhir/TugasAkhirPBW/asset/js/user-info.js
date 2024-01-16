const icon = document.querySelector('.search-icon');
const search = document.querySelector('.ssearch');
icon.onclick = function () {
    search.classList.toggle('active')
}

function togglePopup(idname) {
    document.getElementById(idname).classList.toggle("active");
}

function searchSoldiers() {
    var input = document.getElementById('mysearch').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector('.content').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "user.php?keyword=" + input, true);
    xhttp.send();
}

function clearSearch() {
    document.getElementById('mysearch').value = '';
    searchSoldiers();
}