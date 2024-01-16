<?php
    session_start();
    require "asset/php/db-config.php";
    if(!isset($_SESSION['session_username'])){
        header("location:login.php");
        exit();
    }

    $keyword = $_GET['keyword'];

    $i = 1;
    $query = "SELECT * FROM users WHERE role = 'user' AND full_name LIKE '%$keyword%' ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    $output = '<table>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Skills</th>
                        <th>Action</th>
                    </tr>';

    foreach ($result as $row) {
        $output .= '<tr>
                        <td id="center-part">' . $i++ . '</td>
                        <td id="center-part"><img src="asset/image/user/' . $row['image'] . '" title="' . $row['image'] . '"></td>
                        <td>' . $row['full_name'] . '</td>
                        <td>' . $row['skills'] . '</td>
                        <td id="center-part">
                            <div class="icon">
                                <a href="user-profile-page.php?id=' . $row['id'] . '" class="detail-btn">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            </div>
                    </td>
                    </tr>';
    }

    $output .= '</table>';

    echo $output;
    echo '<script src="asset/js/user-info.js"></script>';
?>
