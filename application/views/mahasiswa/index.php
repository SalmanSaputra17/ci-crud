<div class="container">
	<div class="row mt-3">
		<div class="col-12">
			<a href="<?= base_url() ?>mahasiswa/create" class="btn btn-primary btn-sm">Tambah Data Mahasiswa</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<h3 class="display-4 mt-2 mb-4">Daftar Mahasiswa</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col-6">
			<form action="<?= base_url('mahasiswa') ?>" method="post">
	            <div class="input-group">
	                <input type="text" class="form-control" id="filter" name="filter" value="<?= @$filter; ?>" autocomplete="off" autofocus>
	                <div class="input-group-append">
	                    <button type="submit" name="submit-filter" class="btn btn-secondary">Cari</button>
	                </div>
	            </div>
	        </form>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-12">
			<div class="flash" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>

			<?php if(!empty($mahasiswa)): ?>
				<ul class="list-group">
					<?php foreach($mahasiswa as $row): ?>
				  		<li class="list-group-item">
				  			<?= $row->nama ?>
				  			<a href="<?= base_url() ?>mahasiswa/delete/<?= $row->id ?>" class="btn btn-danger btn-sm btn-delete float-right ml-1">Hapus</a>
				  			<a href="<?= base_url() ?>mahasiswa/edit/<?= $row->id ?>" class="btn btn-success btn-sm float-right ml-1">Ubah</a>
				  			<button data-id="<?= $row->id ?>" class="btn btn-info btn-sm btn-detail float-right ml-1" data-toggle="modal" data-target="#detailModal">Detail</button>
				  		</li>
					<?php endforeach; ?>
				</ul>
				
				<?= $this->pagination->create_links(); ?>
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