$('document').ready(function() {
	$('.btn-detail').click(function() {
		let id = $(this).data('id');

		$.ajax({
            url: './mahasiswa/detail/' + id,
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