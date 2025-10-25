<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data KTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4 mb-5">
        <h1 class="text-center">Tabel Data KTP</h1>
        <hr>

        <a href="form_ktp.php" class="btn btn-success mb-3">
            + Tambah Data
        </a>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tmpt, Tgl Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat Lengkap</th>
                                <th>Agama</th>
                                <th>Status</th>
                                <th>Pekerjaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php
    
    include "koneksi.php";

    
    $query = mysqli_query($conn, "SELECT * FROM `data_ktp`");

    
    if (!$query) {
        
        echo "<tr><td colspan='10' class='text-center'>Query Gagal: " . mysqli_error($conn) . "</td></tr>";
    
    } else {
        
      
        if (mysqli_num_rows($query) > 0) {
            $no = 1; 
            
            
            while ($data = mysqli_fetch_assoc($query)) {
                ?>
                
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nik']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['tempat_lahir'] . ', ' . date('d-m-Y', strtotime($data['tgl_lahir'])); ?></td>
                    <td><?php echo $data['jenis_kelamin']; ?></td>
                    
                    <td>
                        <?php 
                            echo $data['alamat'] . ', RT ' . $data['rt'] . '/RW ' . $data['rw'] . ', Kel. ' . $data['kelurahan'] . ', Kec. ' . $data['kecamatan'];
                        ?>
                    </td>
                    
                    <td><?php echo $data['agama']; ?></td>
                    <td><?php echo $data['status_perkawinan']; ?></td>
                    <td><?php echo $data['pekerjaan']; ?></td>
                    <td>
                        <a href="edit_ktp.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm me-1">Edit</a>
                        <a href="hapus_ktp.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                
                <?php
            } 
        
        } else {
           
            echo "<tr><td colspan='10' class='text-center'>Belum ada data yang diinput</td></tr>";
        }
    }
    
    
    mysqli_close($conn);
    ?>
</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>