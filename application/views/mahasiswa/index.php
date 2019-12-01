<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Mahasiswa</h2>
  <p>Table Mahasiswa</p>
  <a href="<?=base_url('index.php/mahasiswa/add');?>" class="btn btn-primary">Tambah Data</a>
  <?=$this->session->flashdata('item');?>
  <table class="table">
    <thead>
      <tr>
        <th>nim</th>
        <th>nama</th>
        <th>jenis kelamin</th>
        <th>alamat</th>
        <th>no hp</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($data as $data) {?>
      <tr>
        <td><?=$data->nim;?></td>
        <td><?=$data->nama;?></td>
        <td><?=$data->deskripsi;?></td>
        <td><?=$data->alamat;?></td>
        <td><?=$data->no_hp;?></td>
        <td>
          <a href="<?=base_url().'index.php/mahasiswa/edit/'.$data->nim;?>" class="btn btn-info">Edit</a>
          <a href="<?=base_url().'index.php/mahasiswa/delete/'.$data->nim;?>" onclick="confirm('apa anda yakin')" class="btn btn-danger">hapus</a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
