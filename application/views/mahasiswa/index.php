<div class="container">
	<div class="row mt-3">
		<div class="col-6">
			<a href="<?= base_url() ?>mahasiswa/create" class="btn btn-primary btn-sm">Tambah Data Mahasiswa</a>
			<h3 class="display-4 mt-2 mb-4">Daftar Mahasiswa</h3>

			<?php if ($this->session->flashdata('info')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <?= $this->session->flashdata('info') ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php endif; ?>

			<ul class="list-group">
				<?php foreach($mahasiswa as $row): ?>
			  		<li class="list-group-item">
			  			<?= $row->nama ?>
			  			<a href="<?= base_url() ?>mahasiswa/delete/<?= $row->id ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>		
			  		</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>