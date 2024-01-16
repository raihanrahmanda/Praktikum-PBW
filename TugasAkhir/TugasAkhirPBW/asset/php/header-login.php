<?php
require "db-config.php";

// Retrieve search suggestions from the MySQL database
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
$searchQuery = mysqli_real_escape_string($conn, $searchQuery);

$query = "SELECT id,full_name FROM users WHERE full_name LIKE '%$searchQuery%' AND role = 'user'";
$result = mysqli_query($conn, $query);

$suggestions = array();
while ($row = mysqli_fetch_assoc($result)) {
    $itemId = $row['id'];
    $itemName = $row['full_name'];

    $suggestions[] = array(
        'id' => $itemId,
        'name' => $itemName
    );
}
?>


<?php
echo '
    <header>
        <div class="search-bar">
            <div class="logo-corner">
                <a href="beranda-user.php">
                    <img src="asset/image/logo-title-final.svg" alt="Logo CatchAW">
                </a>
            </div>
            <div class="search">
                <input type="text" id="searchInput" onkeyup="searchFunction()" placeholder="Search...">
                <div id="searchResults"></div>
            </div>
        </div>
        <div class="icon-bar">
            <ul>
                <li>
                    <a href="beranda-user.php">
                        <div class="icon">
                            <i class="fa-solid fa-house"></i>
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <div class="name">Home</div>
                    </a>
                </li>
                <li>
                    <a href="contact.php">
                        <div class="icon">
                            <i class="fa-solid fa-envelope fa-lg"></i>
                            <i class="fa-solid fa-envelope fa-lg"></i>
                        </div>
                        <div class="name">mailbox</div>
                    </a>
                </li>
                <li>
                    <a href="project.php">
                        <div class="icon">
                            <i class="fa-solid fa-briefcase"></i>
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div class="name">Project</div>
                    </a>
                </li>
                <li>
                    <a href="profile-page.php">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="name">Profile</div>
                    </a>
                </li>
            </ul>
        </div>
    </header>
';
?>

<script>
    function searchFunction() {
        var input = document.getElementById("searchInput");
        var searchQuery = input.value.toLowerCase();
        var searchResultsContainer = document.getElementById("searchResults");

        // Clear the previous search results
        searchResultsContainer.innerHTML = "";

        // Fetch the suggestions from PHP
        var suggestions = <?php echo json_encode($suggestions); ?>;

        if (searchQuery.trim() !== "") {
            var matchingResults = suggestions.filter(function(result) {
                return result.name.toLowerCase().includes(searchQuery);
            });

            if (matchingResults.length === 0) {
                var noMatchMessage = document.createElement("div");
                noMatchMessage.textContent = "No matches found.";
                noMatchMessage.classList.add("no-match");
                searchResultsContainer.appendChild(noMatchMessage);
            } else {
                var resultList = document.createElement("div");

                matchingResults.forEach(function(result) {
                    var resultItem = document.createElement("div");
                    resultItem.classList.add("result");

                    // Create a link with the item ID as a query parameter
                    var link = document.createElement("a");
                    link.href = "user-profile-page.php?id=" + encodeURIComponent(result.id);
                    link.textContent = result.name;

                    resultItem.appendChild(link);
                    resultList.appendChild(resultItem);
                });

                searchResultsContainer.appendChild(resultList);
            }

            // Show the suggestion dropdown
            searchResultsContainer.style.display = "block";
        } else {
            // Hide the suggestion dropdown when there is no input
            searchResultsContainer.style.display = "none";
        }
    }
</script>