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
                <a class="active" href="daftarForm.php">Daftar Sekarang!</a>
            </div>
        </nav>
    
        <main>
            <h2>Formulir Pendaftaran Anggota Baru</h2>

            <p id="pesanErrorBox"> </p>

            <form name="daftarForm" onSubmit="return validate()" action="dbconn_daftar_anggota.php" method="post">          
            <!-- <form name="daftarForm" onsubmit="return validate()">  -->
            <!-- <form name="daftarForm"> -->
                     
            <label for="nama">Nama Lengkap: <span style="color:red;">*</span></label>              
            <input type="text" id="nama" name="nama" required>            
            <br><br>
                      
            <label for="tanggal_lahir">Tanggal Lahir: <span style="color:red;">*</span></label>            
            <input type="date" id="bday" name="tanggal_lahir" required> 
            <br><br>
                      
            <label for="email">Email: <span style="color:red;">*</span></label>         
            <input type="email" id="email" name="email" required>
            <br><br>
                      
            <label for="pwd">Buat Password: <span style="color:red;">*</span></label>        
            <input type="password" id="pwd" name="pwd" placeholder="Password min 8 karakter dan harus ada huruf besar" size="40"  required>                 
            <br><br>

            <label for="pwd2">Konfirmasi Password: <span style="color:red;">*</span></label>        
            <input type="password" id="pwd2" name="pwd2" placeholder="" size="40" required>                   
            <br><br>

            <label>Jenis Kelamin:</label>
            <input type="radio" id="male" name="jenis_kelamin" value="Laki-Laki">
            <label for="male">Laki-Laki</label>
            <input type="radio" id="female" name="jenis_kelamin" value="Perempuan"> 
            <label for="female">Perempuan</label>
            <br><br>
                      
            <!-- <label>Bahasa Pemrograman yang Ingin Dipelajari:</label><br>
            <input type="checkbox" id="bahasa1" name="bahasa1" value="PHP">                        
            <label for="bahasa1"> PHP </label><br>
            <input type="checkbox" id="bahasa2" name="bahasa2" value="Java">                        
            <label for="bahasa2"> Java </label><br>
            <input type="checkbox" id="bahasa3" name="bahasa3" value="Python">                        
            <label for="bahasa3"> Python </label>
            <br><br>    -->

            <label>Bahasa Pemrograman yang Ingin Dipelajari:</label><br>
            <input type="checkbox" id="bahasa1" name="isphp" value="Ya">                        
            <label for="bahasa1"> PHP </label><br>
            <input type="checkbox" id="bahasa2" name="isjava" value="Ya">                        
            <label for="bahasa2"> Java </label><br>
            <input type="checkbox" id="bahasa3" name="ispython" value="Ya">                        
            <label for="bahasa3"> Python </label>
            <br><br>                                                  
                    
                    
            <label for="alasan">Alasan Bergabung:</label>
            <textarea id="alasan" name="alasan" rows="4" cols="50"></textarea>                           
            <br><br>
                    
            <label for="matkul_fav">Mata Kuliah Favorit:</label>
            <select id="matkul_fav" name="matkul_fav">
                <option label="" value="">Pilih Mata Kuliah:</option>
                <option value="PTI">Pengantar Teknologi Informasi</option>       
                <option value="Matdis">Matematika Diskrit</option>               
                <option value="Basdat">Basis Data Lanjutan</option>              
                <option value="PBW">Pemrograman Berbasis Web</option>           
                <option value="RPL">Rekayasa Perangkat Lunak</option>     
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