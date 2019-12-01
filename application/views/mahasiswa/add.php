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

  <form action="<?= base_url().'index.php/mahasiswa/add_aksi';?>" method="post">
    <div class="form-group">
      <label for="nim">nim:</label>
      <input type="number" class="form-control" id="nim" name="nim">
    </div>
    <div class="form-group">
      <label for="nama">nama:</label>
      <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="form-group">
      <label for="jk">jk:</label>
      <select class="form-control" name="jk">
        <?php foreach ($jk as $data) {?>
        <option value="<?=$data->id;?>"><?=$data->deskripsi;?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="alamat">alamat:</label>
      <textarea class="form-control" name="alamat"></textarea>
    </div>
    <div class="form-group">
      <label for="no_hp">no_hp:</label>
      <input type="number" class="form-control" id="no_hp" name="no_hp">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  
</div>

</body>
</html>
