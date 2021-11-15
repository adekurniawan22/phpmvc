$(function(){

	$('.tombolTambahData').on('click', function(){
		$('#formModalLabel').html('Tambah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('#nama').val('');
        $('#nim').val('');
        $('#kelas').val('');
        $('#id').val('');
	})

	$('.tampilModalUbah').on('click',function(){
		$('#formModalLabel').html('Ubah Data');
		$('.modal-footer button[type=submit]').html('Ubah Data Mahasiswa');
		$('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

		const id = $(this).data('id');

		$.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#kelas').val(data.kelas);
                $('#id').val(data.id);
            }
        });
	})


});