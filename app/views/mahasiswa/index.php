<div class="container mt-3">
	<div class="container mt-3">
	<div class="row">
		<div class="col-lg-6 mb-3">
			<?php Flasher::flash(); ?>
        	<button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Data Mahasiswa</button>	
		</div>	
	</div>

	<div class="row">
		<div class="col-lg-6 mb-3">
			<form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Masukkan Nama Mahasiswa" aria-label="Recipient's username" aria-describedby="button-addon2" name="katakunci" autocomplete="off">
				  <div class="input-group-append">
				    <button class="btn btn-outline-secondary" type="submit" id="tombolCari">Cari!</button>
				  </div>
				</div>
			</form>
		</div>	
	</div>

	<div class="row">
        <div class="col-lg-6">
          <h3>Daftar Mahasiswa</h3>
          <ul class="list-group">
            <?php foreach( $data['mhs'] as $mhs ) : ?>
              <li class="list-group-item">
                  <?= $mhs['nama']; ?>
                  <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right ml-2" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Hapus</a>
                  <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right ml-2">Detail</a>
                  <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-warning float-right ml-2 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
              </li>
            <?php endforeach; ?>
          </ul>      
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
			<div class="mb-3">
				<input type="hidden" name="id" id="id">
			<label for="nama" class="form-label">Nama</label>
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa...">
			</div>

			<div class="mb-3">
			<label for="nim" class="form-label">NIM</label>
			<input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM  Mahasiswa...">
			</div>

			<div class="mb-3">
			<label for="kelas" class="form-label">Kelas</label>
				<select class="form-control" id="kelas" name="kelas">
					<option>Pilih Kelas</option>
					<option value="IF1">IF-1</option>
					<option value="IF2">IF-2</option>
					<option value="IF3">IF-3</option>
					<option value="IF4">IF-4</option>
					<option value="IF5">IF-5</option>
				</select>
		</div>
        
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Tambah Data</button>
		</div>
		</form>
	</div>
  </div>
</div>