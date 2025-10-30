<?php
        include '../demo.plainadmin.com/koneksi.php';

        if(isset($_POST['aksi'])){
            if($_POST['aksi'] == "add"){

                $IDPELANGGAN = $_POST['id_pelanggan'];
                $NAMAPELANGGAN = $_POST['nama_pelanggan'];
                $ALAMATPELANGGAN = $_POST['alamat_pelanggan'];
                $TELEPONPELANGGAN = $_POST['telepon_pelanggan'];
                $IDRUANGAN = $_POST['id_ruangan'];
                $IDTYPE = $_POST['id_type'];
                $LAMASEWA = $_POST['lama_sewa'];
                $PRIODESEWA = $_POST['priode_sewa'];

                $query = "INSERT INTO tbl_pelanggan VALUES(null, '$IDPELANGGAN', '$NAMAPELANGGAN', '$ALAMATPELANGGAN', '$TELEPONPELANGGAN', '$IDRUANGAN', '$IDTYPE','$LAMASEWA','$PRIODESEWA')";
                $sql = mysqli_query($conn, $query);

                if($sql){
                    echo "Data Berhasil Ditambahkan <a href='../demo.plainadmin.com/index.php'>['home']</a>";
                } else {
                    echo $query;
                }

                //echo $id." | ".$name." | ".$addr." | ".$phone." | ".$ruang." | ".$ut;

            //echo "<br>Add <a href='../demo.plainadmin.com/tables-responsive.php'>[HOME]</a>";
        } else if($_POST['aksi'] == "add"){
            echo "Save <a href='../demo.plainadmin.com/tables-responsive.php'>[HOME]</a>";
      }
    }   

    if(isset($_GET['hapus'])){
        echo "Hapus Data <a href='../index.php'>[home]</a>";
    }
?>