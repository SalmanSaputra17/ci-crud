<div class="container">
	<div class="row mt-3">
		<div class="col-12">
			<a href="<?= base_url() ?>mahasiswa/create" class="btn btn-primary btn-sm">Tambah Data Mahasiswa</a>
			<h3 class="display-4 mt-2 mb-4">Daftar Mahasiswa</h3>

			<form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari nama ..." id="search" name="search" autocomplete="off">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary" id="btn-search">Cari</button>
                    </div>
                </div>
            </form>

			<?php if ($this->session->flashdata('info')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <?= $this->session->flashdata('info') ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php endif; ?>

			<?php if(!empty($mahasiswa)): ?>
				<ul class="list-group">
					<?php foreach($mahasiswa as $row): ?>
				  		<li class="list-group-item">
				  			<?= $row->nama ?>
				  			<a href="<?= base_url() ?>mahasiswa/delete/<?= $row->id ?>" class="btn btn-danger btn-sm float-right ml-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
				  			<a href="<?= base_url() ?>mahasiswa/edit/<?= $row->id ?>" class="btn btn-success btn-sm float-right ml-1">Ubah</a>
				  			<button data-id="<?= $row->id ?>" class="btn btn-info btn-sm btn-detail float-right ml-1" data-toggle="modal" data-target="#detailModal">Detail</button>
				  		</li>
					<?php endforeach; ?>
				</ul>
			<?php else: ?>
				<div class="alert alert-warning" role="alert">
				  	Tidak ada data mahasiswa.
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>