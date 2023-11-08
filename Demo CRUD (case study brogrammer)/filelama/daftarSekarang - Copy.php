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
            <div class="navwrap"> 
                <a href="index.php">Home</a>
                <a href="anggotaAktif.php">Anggota Aktif</a>
                <a class="active" href="daftarSekarang.php">Daftar Sekarang!</a>
            </div>
        </nav>
    
        <main>
            <h2>Formulir Pendaftaran Anggota Baru</h2>
            <p></p>

            <!-- <form name="myForm" action="/action_page.php" target="_blank" autocomplete="on" novalidate> -->
            <form name="myForm">
                     
            <label for="nama">Nama Lengkap:</label>              
            <input type="text" id="nama" name="nama">            
            <br><br>
                      
            <label for="bday">Tanggal Lahir:</label>            
            <input type="date" id="bday" name="bday"> 
            <br><br>
                      
            <label for="email">Email:</label>         
            <input type="email" id="email" name="email">
            <br><br>
                      
            <label for="pwd">Password:</label>        
            <input type="password" id="pwd" name="pwd" placeholder="Tentukan password yang akan digunakan untuk login berikutnya" size="40">                   
            <br><br>
                      
            <label>Jenis Kelamin:</label>
            <input type="radio" id="male" name="jeniskelamin" value="1">
            <label for="male">Laki-Laki</label>
            <input type="radio" id="female" name="jeniskelamin" value="2"> 
            <label for="female">Perempuan</label>
            <br><br>
                      
            <label>Bahasa Pemrograman yang Ingin Dipelajari:</label><br>
            <input type="checkbox" id="bahasa1">                         <!--name="bahasa1" value="PHP"-->
            <label for="bahasa1"> PHP </label><br>
            <input type="checkbox" id="bahasa2">                         <!--name="bahasa2" value="Java"-->
            <label for="bahasa2"> Java </label><br>
            <input type="checkbox" id="bahasa3">                         <!--name="bahasa3" value="Python"-->
            <label for="bahasa3"> Python </label>
            <br><br>                                                     <!-- name bisa array -->
                      
                    
            <!-- disabled -->
            <!-- required -->
            <!-- readonly value="Read Only"-->
            <!-- placeholder -->
            <!-- size,minlength,maxlength  BACA AJA GA USAH DIDEMOIN-->
                    
                    
            <label for="alasan">Alasan Bergabung:</label>
            <textarea id="alasan" name="alasan" rows="4" cols="50"></textarea>                           
            <br><br>
                    
            <label for="matkul">Mata Kuliah Favorit:</label>
            <select id="matkul" name="matkul">
                <option>Pengantar Teknologi Informasi</option>       <!--label="PTI" value="mk001"-->
                <option>Matematika Diskrit</option>                  <!--label="Matdis" value="mk002"-->
                <option>Basis Data Lanjutan</option>                 <!--label="Basdat" value="mk003" --> 
                <option>Pemrograman Berbasis Web</option>            <!--label="PBW" value="mk004"-->
                <option>Rekayasa Perangkat Lunak</option>            <!--label="RPL" value="mk005"-->
            </select>
            <br><br>
                    
            <!-- selected -->
            <!-- disabled -->
            <!-- <option value ="" > Pilihan Mata Kuliah:  </ option > REQUIRED di select--> 
                      
            <input type="submit" value="Submit">
            <!-- <input type="reset"> -->
                    
            <!-- bisa input bisa button-->
                      
            </form> 
            </br></br>   
        </main>
    
        <footer>
            <p>Copyright © Politeknik Statistika STIS. All right reserved.</p>
        </footer>
    </body>
</html>