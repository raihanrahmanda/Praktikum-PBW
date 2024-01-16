<?php
session_start();
require "asset/php/db-config.php";

// Retrieve the search keyword from the AJAX request
$keyword = $_GET['keyword'];

// Prepare the SQL query with a WHERE clause to search for matching competitions
$query = "SELECT * FROM competitions WHERE name LIKE '%$keyword%' ORDER BY id DESC";
$result = mysqli_query($conn, $query);

// Generate the updated HTML content for the competition cards
$output = '';
foreach ($result as $row) {
    $output .= '
        <div class="competition-card">
            <div class="competition-image" onclick="togglePopup(\'popup-' . $row['id'] . '\')">
                <img src="asset/image/lomba/' . $row['image'] . '" title="' . $row['image'] . '">
            </div>
            <div class="competition-title">
                <p>' . $row['name'] . '</p>
            </div>
            <div class="popup" id="popup-' . $row['id'] . '">
                <div class="overlay"></div>
                <div class="popup-content">
                    <div class="close-btn" onclick="togglePopup(\'popup-' . $row['id'] . '\')">&times;</div>
                    <div class="content-box">
                        <b>Name:</b> <br>
                        ' . $row['name'] . '<br>
                        <br>
                        <b>Organizer:</b> <br>
                        ' . $row['organizer'] . '<br>
                        <br>
                        <b>Description:</b> <br>
                        ' . $row['description'] . '<br>
                        <br>
                        <b>Open Registration Date:</b> <br>
                        ' . $row['open_date'] . ' s.d ' . $row['close_date'] . ' <br>
                        <br>
                        <b>Requirements:</b> <br>
                        ' . $row['requirement'] . ' <br>
                        <br>
                        <b>Registration Fee:</b> <br>
                        Rp' . $row['reg_fee'] . ',-<br>
                        <br>
                        <b>Registration Link:</b> <br>
                        <a href="' . $row['reg_link'] . '">' . $row['reg_link'] . '</a><br>
                        <br>
                        <b>Guidebook Link:</b> <br>
                        <a href="' . $row['guide_link'] . '">' . $row['guide_link'] . '</a><br>
                        <br>
                        <b>Contact Person:</b> <br>
                        <a href="https://instagram.com/' . $row['cp'] . '">' . $row['cp'] . '</a><br>
                    </div>
                </div>
            </div>
        </div>
    ';
}

echo $output;

echo '<script src="asset/js/competition.js"></script>';
?>
