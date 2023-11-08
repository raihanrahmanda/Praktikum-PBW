<!Doctype html>
<html lang="en">
<head>
    <title> Brogrammer </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

    <body>

        <nav>
            <img src="images\logo.png" alt="Logo">
            <div class="logo">
                BROGRAMMER CODING CLUB
            </div>
            <div class="navwrap"> 
                <a href="index.php">Home</a>
                <a class="active" href="anggota.php">Anggota Aktif</a>
                <a href="gallery.php">Galeri</a>
                <a href="daftar.php">Daftar Sekarang!</a>
            </div>
        </nav>
    
        <main>
                
            <!-- breadcrumb -->
            <!-- <div class="breadcrumb">
                <br/><br/>
                <a href="index.php">Home ></a>
                <a href="#">Anggota Aktif</a>
            </div> -->

            <h2>Daftar Anggota Aktif Brogrammer</h2>
            <table border="1">
                <tr>
                    <th> No.</th>
                    <th>Nama</th> 
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                </tr>


                <?php 
                
                    require 'dbconn.php';

                    $rows = selectAnggota();    
                    $i=1;

                    foreach ($rows as $value){?>
                        <tr>
                            <td> <?php echo $i; ?></td>
                            <td> <?php echo $value["nama"]; ?></td>
                            <td> <?php echo $value["jenis_kelamin"]; ?></td>
                            <td> <?php echo $value["email"]; ?></td>
                         </tr>
                <?php
                        $i++;
                    }
                ?>
            </table>
            <br>
            <br>

                <table border="1">
                    <tr>
                        <!-- <th colspan="2">Nama Lengkap</th> -->
                        <th> No.</th>
                        <th>Nama</th> 
                        <th>Umur</th>
                        <th>Aksi</th>
                    </tr>
                            
                    <tr>
                        <td> Jeff</td>
                        <td> Bezos</td>
                        <td> 57</td>
                        <td> 57</td>
                    </tr>
            
                    <tr>
                        <td> Jack</td>
                        <td> Ma</td>
                        <td> 56</td>
                        <td> 57</td>
                    </tr>
            
                    <tr>
                        <td> Larry</td>
                        <td> Page</td>
                        <td> 47</td>
                        <td> 47</td>
                    </tr>
                </table>
                
        </main>
    
        <footer>
            <p>Copyright © Brogrammer. All right reserved.</p>
        </footer>
    </body>
</html>