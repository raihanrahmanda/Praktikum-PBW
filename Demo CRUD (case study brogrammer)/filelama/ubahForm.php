<!Doctype html>
<html lang="en">
<head>
    <title> Brogrammer </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="formScript.js"></script> 
</head>

    <body>

        <nav>
            <img src="images\logo.png" alt="Logo">
            <div class="logo">
                BROGRAMMER CODING CLUB
            </div>
            <div class="navwrap"> 
                <a href="index.php">Home</a>
                <a href="anggota.php">Anggota Aktif</a>
                <a href="gallery.php">Galeri</a>
                <a class="active" href="daftar.php">Daftar Sekarang!</a>
            </div>
        </nav>
    
        <main>
            <?php
                
                //dapatkan dulu data yang ingin diubah
                $id=$_GET["id"];
                require 'dbconn_ambil_anggota_byid.php';

            ?>

            <h2>Ubah Data Anggota</h2>

            <p id="pesanErrorBox"> </p>

            <form name="daftarForm" onSubmit="return validate()" action="dbconn_update_anggota.php" method="post"> 

            <input type="hidden" id="id" name="id" value=<?php echo $rows["id"] ?>>

            <label for="nama">Nama Lengkap: <span style="color:red;">*</span></label>              
            <input type="text" id="nama" name="nama" value="<?php echo $rows["nama"] ?>" required>            
            <br><br>
                      
            <label for="bday">Tanggal Lahir: <span style="color:red;">*</span></label>            
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $rows["tanggal_lahir"] ?>" required> 
            <br><br>
                      
            <label for="email">Email: <span style="color:red;">*</span></label>         
            <input type="email" id="email" name="email" value="<?php echo $rows["email"] ?>"required>
            <br><br>
                      
            <!-- <label for="pwd">Buat Password: <span style="color:red;">*</span></label>        
            <input type="password" id="pwd" name="pwd" placeholder="Password min 8 karakter dan harus ada huruf besar" size="40"  required>                 
            <br><br>

            <label for="pwd2">Konfirmasi Password: <span style="color:red;">*</span></label>        
            <input type="password" id="pwd2" name="pwd2" placeholder="" size="40" required>                   
            <br><br> -->

            <label>Jenis Kelamin:</label>
            <input type="radio" id="male" name="jenis_kelamin" value="Laki-Laki"  <?php if ($rows["jenis_kelamin"]=="Laki-Laki") echo "checked";?>>
            <label for="male">Laki-Laki</label>
            <input type="radio" id="female" name="jenis_kelamin" value="Perempuan"  <?php if ($rows["jenis_kelamin"]=="Perempuan") echo "checked";?>> 
            <label for="female">Perempuan</label>
            <br><br>

            <label>Bahasa Pemrograman yang Ingin Dipelajari:</label><br>
            <input type="checkbox" id="bahasa1" name="isphp" value="Ya" <?php if ($rows["is_php"]=="Ya") echo "checked";?>>                        
            <label for="bahasa1"> PHP </label><br>
            <input type="checkbox" id="bahasa2" name="isjava" value="Ya" <?php if ($rows["is_java"]=="Ya") echo "checked";?>>                        
            <label for="bahasa2"> Java </label><br>
            <input type="checkbox" id="bahasa3" name="ispython" value="Ya" <?php if ($rows["is_python"]=="Ya") echo "checked";?>>                        
            <label for="bahasa3"> Python </label>
            <br><br>                                                  
                    
                    
            <label for="alasan">Alasan Bergabung:</label>
            <textarea id="alasan" name="alasan" rows="4" cols="50"><?php echo $rows["alasan"] ?></textarea>                           
            <br><br>
                    
            <label for="matkul_fav">Mata Kuliah Favorit:</label>
            <select id="matkul_fav" name="matkul_fav">
                <option label="" value="" <?php if ($rows["matkul_fav"]=="") echo "selected";?>>Pilih Mata Kuliah:</option>
                <option value="PTI" <?php if ($rows["matkul_fav"]=="PTI") echo "selected";?>>Pengantar Teknologi Informasi</option>       
                <option value="Matdis" <?php if ($rows["matkul_fav"]=="Matdis") echo "selected";?>>Matematika Diskrit</option>               
                <option value="Basdat" <?php if ($rows["matkul_fav"]=="Basdat") echo "selected";?>>Basis Data Lanjutan</option>              
                <option value="PBW" <?php if ($rows["matkul_fav"]=="PBW") echo "selected";?>>Pemrograman Berbasis Web</option>           
                <option value="RPL" <?php if ($rows["matkul_fav"]=="RPL") echo "selected";?>>Rekayasa Perangkat Lunak</option>     
            </select>
            <br><br>
                    
            
                      
            <input type="submit" value="Submit">
            <!-- <input type="reset"> -->
                    
            <!-- bisa input bisa button-->
                      
            </form> 
            </br></br>   
        </main>
    
        <footer>
            <p>Copyright © Brogrammer. All right reserved.</p>
        </footer>
    </body>
</html>