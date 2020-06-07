$('document').ready(function() {
	let flashdata = $('.flash').data('flashdata');

	if (flashdata) {
		Swal.fire({
			icon: 'success',
			title: 'Success!',
			text: flashdata,
			type: 'success'
		});
	}

	$('.btn-delete').on('click', function(e) {
		e.preventDefault();

		let href = $(this).attr('href');

		Swal.fire({
		  	title: 'Apakah Anda yakin ?',
		  	text: "Data akan terhapus secara permanen.",
		  	icon: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#d33',
		  	cancelButtonColor: '#3085d6',
		  	confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  	if (result.value) {
			    document.location.href = href;
		  	}
		});
	});

	$('.btn-detail').on('click', function(e) {
		e.preventDefault();

		let id = $(this).data('id');

		$.ajax({
            url: 'http://localhost:8080/CI_App/mahasiswa/detail/' + id,
            method: 'GET',
            success: function(response) {
            	data = JSON.parse(response);
            	$('.modal .modal-body').html(`<table class='table table-striped'>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td>` + data.nama + `</td>
					</tr>
					<tr>
						<td>NRP</td>
						<td>:</td>
						<td>` + data.nrp + `</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td>` + data.email + `</td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td>:</td>
						<td>` + data.jurusan + `</td>
					</tr>
            	</table>`);
            }
        });
	});
});