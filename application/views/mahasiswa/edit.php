<div class="container">
	<div class="row mt-3">
		<div class="col-12">
			<a href="<?= base_url(); ?>mahasiswa" class="btn btn-secondary btn-sm mb-3">Kembali</a>
			<div class="card border-light shadow bg-white rounded">
				<div class="card-header">
					<h5>Ubah Data Mahasiswa</h5>
				</div>
				<div class="card-body">
					<form action="<?= base_url(); ?>mahasiswa/update" method="post">
						<input type="hidden" name="id" value="<?= $model->id ?>">
			            <div class="form-group">
			                <label for="nama">Nama</label>  
			                <input type="text" class="form-control" id="nama" name="nama" value="<?= $model->nama ?>">
			                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
			            </div>
			            <div class="form-group">
			                <label for="nrp">NRP</label>  
			                <input type="number" class="form-control" id="nrp" name="nrp" value="<?= $model->nrp ?>">
			                <small class="form-text text-danger"><?= form_error('nrp'); ?></small>
			            </div>
			            <div class="form-group">
			                <label for="email">Email</label>  
			                <input type="email" class="form-control" id="email" name="email" value="<?= $model->email ?>">
			                <small class="form-text text-danger"><?= form_error('email'); ?></small>
			            </div>
			            <div class="form-group">
			                <label for="jurusan">Jurusan</label>  
			                <select name="jurusan" id="jurusan" class="form-control">
			                    <option value="" selected>--pilih jurusan--</option>
			                    <?php foreach($jurusan as $jrs): ?>
			                    	<option value="<?= $jrs['key'] ?>" <?= $model->jurusan == $jrs['key'] ? 'selected' : '' ?>><?= $jrs['name'] ?></option>
			                    <?php endforeach; ?>
			                </select>
			                <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>
			            </div>

			            <button type="submit" class="btn btn-primary btn-block btn-sm float-right">Simpan Perubahan</button>
			        </form>
				</div>
			</div>
		</div>
	</div>
</div>