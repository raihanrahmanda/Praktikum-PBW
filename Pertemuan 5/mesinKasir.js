let daftarBelanja = [];
let total = 0;
let totalharga = 0;
function tambah() {
    let barang = document.getElementById("barang").value;
    let harga = document.getElementById("harga").value;
    let qty = document.getElementById("kuantitas").value;

    if (barang === "" || harga === "") {
        alert("Silakan isi nama dan harga barang terlebih dahulu.");
        return;
    }

    harga = parseInt(harga);

    if (isNaN(harga)) {
        alert("Harga barang harus berupa angka.");
        return;
    }

    daftarBelanja.push({
        barang: barang,
        harga: harga,
        qty : qty,
        totalharga : totalharga
    });

    let table = document.getElementById("daftar_belanja");
    let row = table.insertRow();
    let cell1 = row.insertCell();
    let cell2 = row.insertCell();
    let cell3 = row.insertCell();
    let cell4 = row.insertCell();

    cell1.innerHTML = barang;
    cell2.innerHTML = "Rp " + harga.toLocaleString();
    cell3.innerHTML = qty;
    cell4.innerHTML = qty * harga;

    updateTotalHarga();
    clearFields();
}

function updateTotalHarga() {    
    for (let i = 0; i < daftarBelanja.length; i++) {
        total = daftarBelanja[i].qty * daftarBelanja[i].harga;
        totalharga = total + daftarBelanja[i].totalharga;
    }

    let total_harga = document.getElementById("total_harga");
    total_harga.innerHTML = "Rp " + totalharga.toLocaleString();
}

function kembalian(){
    let bayar = document.getElementById("bayar").value;
    let uang_kembali = 0;
    
    uang_kembali = bayar - totalharga;

    let pengembalian = document.getElementById("uang_kembali");
    pengembalian.innerHTML = "Rp " + uang_kembali.toLocaleString();
}

function clearFields() {
    document.getElementById('barang').value = '';
    document.getElementById('harga').value = '';
    document.getelementById('qty').value = '';
}