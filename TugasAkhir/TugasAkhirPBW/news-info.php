<?php
    session_start();
    require "asset/php/db-config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <link rel="stylesheet" href="asset/css/news-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <title>News List</title>

</head>

<body>
    <?php
        if(!isset($_SESSION['session_username'])){
            echo "<link rel='stylesheet' href='asset/css/header-not-login-style.css'>";
            include 'asset/php/header-not-login.php';
        } else {
            echo "<link rel='stylesheet' href='asset/css/header-login-style.css'>";
            include 'asset/php/header-login.php';
        }
    ?>


    <div class="title">
        <div class="text">
            <h1>News List</h1>
        </div>
        <div class="toggle-search">
            <div class="ssearch">
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                </div>
                <div class="input">
                    <input type="text" placeholder="Type keyword here" id="mysearch" onclick="searchNews()">
                </div>
                <span class="clear" onclick="clearSearch()"></span>
            </div>
        </div>
    </div>
        
    <div class="content" id="news-container">
        <?php
            $rows = mysqli_query($conn, "SELECT * FROM news ORDER BY id DESC")
        ?>
        <?php foreach ($rows as $row) : ?>
        <div class="news1">
            <hr>
            <div class="news-content">
                <div class="news-image">
                <img src="asset/image/news/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>">
                </div>
                <div class="news-text">
                    <div class="news-main-box">
                        <div class="news-title">
                            <h1><?php echo $row["title"]; ?></h1>
                        </div>
                        <div class="news-main">
                            <p>
                            <?php
                                if (strlen($row["description"]) > 200) {
                                    $content = $row["description"];
                                    $string = strip_tags($content);
                                    if (strlen($string) > 20) {
                                        $stringCut = substr($string, 0, 200);
                                        $endPoint = strrpos($stringCut, ' ');
                                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= '... <a href="news-page.php?id=' . $row["id"] . '">read more</a>';
                                    }
                                    echo $string;
                                } else {
                                    echo $row["description"];
                                }
                            ?>
                            </p>
                        </div>
                    </div>
                   
                    <div class="news-footer">
                        <p><em>Posted on</em><br><?php echo $row["date"]; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
    </div>


    <script src="asset/js/news.js"></script>
</body>

</html>