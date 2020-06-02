<div class="container">
	<div class="row mt-3">
		<div class="col-12">
			<a href="<?= base_url(); ?>mahasiswa" class="btn btn-secondary btn-sm mb-3">Kembali</a>
			<div class="card border-light shadow bg-white rounded">
				<div class="card-header">
					<h5>Tambah Data Mahasiswa</h5>
				</div>
				<div class="card-body">
					<?php if (validation_errors()): ?>
						<div class="alert alert-danger" role="alert">
							<?= validation_errors() ?>
						</div>
					<?php endif; ?>

					<form action="<?= base_url(); ?>mahasiswa/store" method="post">
			            <div class="form-group">
			                <label for="nama">Nama</label>  
			                <input type="text" class="form-control" id="nama" name="nama">
			            </div>
			            <div class="form-group">
			                <label for="nrp">NRP</label>  
			                <input type="number" class="form-control" id="nrp" name="nrp">
			            </div>
			            <div class="form-group">
			                <label for="email">Email</label>  
			                <input type="email" class="form-control" id="email" name="email">
			            </div>
			            <div class="form-group">
			                <label for="jurusan">Jurusan</label>  
			                <select name="jurusan" id="jurusan" class="form-control">
			                    <option disable selected>--pilih jurusan--</option>
			                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
			                    <option value="Teknik Jaringan dan Komunikasi">Teknik Jaringan dan Komunikasi</option>
			                    <option value="Multimedia">Multimedia</option>
			                    <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
			                    <option value="Pemasaran">Pemasaran</option>
			                </select>
			            </div>

			            <button type="submit" class="btn btn-primary btn-block btn-sm float-right">Simpan</button>
			        </form>
				</div>
			</div>
		</div>
	</div>
</div>