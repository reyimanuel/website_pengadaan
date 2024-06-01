<?php
$conn = mysqli_connect("localhost", "root", "", "website");

function registrasi($data) {
    global $conn;

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $role = $data["role"];

    $result = mysqli_query($conn,"SELECT email FROM users WHERE email = '$email'");
    if(mysqli_fetch_assoc($result) ){
        echo"<script>
                alert('Username sudah terdaftar!');
                </script>";
                return false;
    }

    if( $password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
                </script>";
                return false;
    } else {
        echo mysqli_error($conn);
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users (email, password, role) VALUES('$email', '$password', '$role')");

    return mysqli_affected_rows($conn);
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
}
    return $rows;
}

function tambah($barang) {
    global $conn;
    
    $id_barang = htmlspecialchars($barang["ID_Barang"]);
    $nama = htmlspecialchars($barang["Nama_Barang"]);
    $jumlah = htmlspecialchars($barang["Jumlah"]);
    $satuan = htmlspecialchars($barang["Satuan"]);
    $status = 'Pending';
    
    $insert = "INSERT INTO barang (ID_Barang, Nama_Barang, Jumlah, Satuan, Status) 
    VALUES('$id_barang', '$nama', '$jumlah', '$satuan', '$status')";

    $query_result = mysqli_query($conn, $insert);

    if ($query_result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1;
    }
}

function tambahrfq($rfq) {
    global $conn;
    
    $id_barang = htmlspecialchars($rfq["id_barang"]);
    $nama = htmlspecialchars($rfq["nama_barang"]);
    $jumlah = htmlspecialchars($rfq["jumlah"]);
    $satuan = htmlspecialchars($rfq["satuan"]);
    $date = htmlspecialchars($rfq["deadline"]);
    $harga = htmlspecialchars($rfq["harga"]);
    $status = 'Pending';
    
    $insert = "INSERT INTO rfq (ID_Barang, Nama_Barang, Jumlah, Satuan, Deadline, Harga, Status) 
    VALUES('$id_barang', '$nama', '$jumlah', '$satuan', '$date', '$harga', '$status')";

    $query_result = mysqli_query($conn, $insert);

    if ($query_result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1;
    }
}

function tambah2($barang) {
    global $conn;
    
    $id_barang = htmlspecialchars($barang["ID_Barang"]);
    $nama = htmlspecialchars($barang["Nama_Barang"]);
    $jumlah = htmlspecialchars($barang["Jumlah"]);
    $satuan = htmlspecialchars($barang["Satuan"]);
    $harga = htmlspecialchars($barang["Harga"]);
    
    $insert = "INSERT INTO barang_vendor (ID_Barang, Nama_Barang, Jumlah, Satuan, Harga) 
    VALUES('$id_barang', '$nama', '$jumlah', '$satuan', '$harga')";

    $query_result = mysqli_query($conn, $insert);

    if ($query_result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1;
    }
}

function hapus($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"DELETE FROM barang WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function hapus2($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"DELETE FROM barang_vendor WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function hapus3($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"DELETE FROM rfq WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function setujui($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE barang SET Status = 'Disetujui' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function setujui2($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE rfq SET Status = 'Diterima' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function Beli($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE barang_vendor SET Status = 'Dibeli' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function tolak($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE barang SET Status = 'Ditolak' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function tolak2($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE rfq SET Status = 'Ditolak' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function ubah($barang){
    global $conn;

    $no = $barang["No"];
    $id_barang = htmlspecialchars($barang["ID_Barang"]);
    $nama = htmlspecialchars($barang["Nama_Barang"]);
    $jumlah = htmlspecialchars($barang["Jumlah"]);
    $satuan = htmlspecialchars($barang["Satuan"]);

    $query = "UPDATE barang SET 
    ID_Barang = '$id_barang', 
    Nama_Barang = '$nama', 
    Jumlah = '$jumlah', 
    Satuan = '$satuan' 
    WHERE No = $no";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubah2($vendor){
    global $conn;

    $no = $vendor["No"];
    $id_barang = htmlspecialchars($vendor["ID_Barang"]);
    $nama = htmlspecialchars($vendor["Nama_Barang"]);
    $jumlah = htmlspecialchars($vendor["Jumlah"]);
    $satuan = htmlspecialchars($vendor["Satuan"]);
    $harga = htmlspecialchars($vendor["Harga"]);

    $query = "UPDATE barang_vendor SET 
    ID_Barang = '$id_barang', 
    Nama_Barang = '$nama', 
    Jumlah = '$jumlah', 
    Satuan = '$satuan',
    Harga = '$harga' 
    WHERE No = $no";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah3($rfq){
    global $conn;

    $no = $rfq["No"];
    $id_barang = htmlspecialchars($rfq["ID_Barang"]);
    $nama = htmlspecialchars($rfq["Nama_Barang"]);
    $jumlah = htmlspecialchars($rfq["Jumlah"]);
    $satuan = htmlspecialchars($rfq["Satuan"]);
    $date = htmlspecialchars($rfq["Deadline"]);
    $harga = htmlspecialchars($rfq["Harga"]);

    $query = "UPDATE rfq SET 
    ID_Barang = '$id_barang', 
    Nama_Barang = '$nama', 
    Jumlah = '$jumlah', 
    Satuan = '$satuan',
    Deadline = '$date',
    Harga = '$harga' 
    WHERE No = $no";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>