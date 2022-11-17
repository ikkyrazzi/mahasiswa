<?php

//Konek ke Database
$conn = mysqli_connect("localhost", "root", "", "kampus");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    
    $id = $data["id"];
    $jml_pembayaran = htmlspecialchars($data["jml_pembayaran"]);
    $bln_pembayaran = htmlspecialchars($data["bln_pembayaran"]);
    $thn_pembayaran = htmlspecialchars($data["thn_pembayaran"]);

    $query = "INSERT INTO pembayaran
                VALUES
                ('', '$jml_pembayaran', '$bln_pembayaran', '$thn_pembayaran')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM pembayaran WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;

    $id = $data["id"];
    $jml_pembayaran = $data["jml_pembayaran"];
    $bln_pembayaran = $data["bln_pembayaran"];
    $thn_pembayaran = $data["thn_pembayaran"];


    //cek apakah user pilih foto baru atau tidak

    $query = "UPDATE pembayaran SET
                jml_pembayaran = '$jml_pembayaran',
                bln_pembayaran = '$bln_pembayaran',
                thn_pembayaran = '$thn_pembayaran'
            WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM pembayaran
                WHERE
            bln_pembayaran LIKE '%$keyword%' OR
            thn_pembayaran LIKE '%$keyword%'
                ";
    return query($query);
}

function registrasi($data){
    global $conn;

    $nama = stripslashes($data["nama"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert ('username sudah terdaftar');
              </script>";
        return false;
    }

    //cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
                alert ('konfirmasi password tidak sesuai');
              </script>";
        return false;
    }


    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username', '$password','$nama','','','','')");

    return mysqli_affected_rows($conn);


}
function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $jk = $data["jk"];
    $email = $data["email"];
    $no_hp = $data["no_hp"];
    $alamat = $data["alamat"];

    //cek apakah user pilih foto baru atau tidak

    $query = "UPDATE user SET
                nama = '$nama',
                jk = '$jk',
                email = '$email',
                no_hp = '$no_hp',
                alamat = '$alamat'
            WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>