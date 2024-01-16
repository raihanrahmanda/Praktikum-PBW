<?php
    session_start();
    require "asset/php/db-config.php";

    // Check if the search term is provided
    if(isset($_GET['term'])) {
        $term = $_GET['term'];

        // Prepare the query to search for news based on the provided term
        $query = "SELECT * FROM news WHERE title LIKE '%$term%' OR description LIKE '%$term%' ORDER BY id DESC";
        $result = mysqli_query($conn, $query);

        // Loop through the search results and generate HTML for each news item
        $html = '';
        foreach ($result as $row) {
            $html .= '<div class="news1">';
            $html .= '<hr>';
            $html .= '<div class="news-content">';
            $html .= '<div class="news-image">';
            $html .= '<img src="asset/image/news/'.$row["image"].'" title="'.$row["image"].'">';
            $html .= '</div>';
            $html .= '<div class="news-text">';
            $html .= '<div class="news-main-box">';
            $html .= '<div class="news-title">';
            $html .= '<h1>'.$row["title"].'</h1>';
            $html .= '</div>';
            $html .= '<div class="news-main">';
            $html .= '<p>';
            // Truncate the description if it's too long
            if (strlen($row["description"]) > 200) {
                $content = $row["description"];
                $string = strip_tags($content);
                if (strlen($string) > 20) {
                    $stringCut = substr($string, 0, 200);
                    $endPoint = strrpos($stringCut, ' ');
                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $string .= '... <a href="news-page.php?id='.$row["id"].'">read more</a>';
                }
                $html .= $string;
            } else {
                $html .= $row["description"];
            }
            $html .= '</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="news-footer">';
            $html .= '<p><em>Posted on</em><br>'.$row["date"].'</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }

        // Send the generated HTML back to the JavaScript for displaying the search results
        echo $html;
    }
?>
