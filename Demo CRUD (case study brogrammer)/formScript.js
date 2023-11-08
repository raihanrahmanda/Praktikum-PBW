    function validate(){
        //var nama=document.getElementById("nama").value;
        //var nama = document.forms["daftarForm"]["nama"].value;

        //var namaValue = daftarForm.nama.value;
        //alert(nama);
        var pesanError;
        pesanError = validateNama(daftarForm.nama.value);
        pesanError += validateEmail (daftarForm.email.value);
        pesanError += validatePassword (daftarForm.pwd.value);
        pesanError += matchPassword(daftarForm.pwd.value, daftarForm.pwd2.value);

        if (pesanError == "") return true
        //else { alert (pesanError); return false } 
        else {document.getElementById("pesanErrorBox").innerHTML = pesanError; return false}
    }

    function validateNama(field){
        if (/[^a-zA-Z\' ]/.test(field))
            return "Nama hanya boleh berisi huruf. \n"
        else return "";
    }

    function validateEmail(field) {
        if (/[^a-zA-Z0-9\.\@\_\-]/.test(field))
            return "Terdapar karakter yang tidak valid pada email. \n"
        else return "";
    }

    function validatePassword(field) {
        if (field.length < 8)
            return "Password minimal 8 karakter \n"
        else if (!/[A-Z]/.test(field)) 
            return "Password harus memuat huruf besar \n"
        else return "";
    }

    function matchPassword(pwd1,pwd2) {
        if(pwd1 != pwd2)
            return "Password tidak match."
        else
            return "";
    }

    //task: validateBday()