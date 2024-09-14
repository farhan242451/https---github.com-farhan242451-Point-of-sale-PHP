$(function(){

    $('.tombolTambahKategori').on('click',function(){

        $('#formModalLabel').html('Tambah Data Kategori');
        $('.modal-footer button[type=submit]').html('Save');
    });

    $('.tombolUbahKategori').on('click', function() {

        $('#formModalLabel').html('Ubah Data Kategori');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/pos/public/kategori/ubah');

        const id_kategori = $(this).data('id');

        $.ajax({
            url: 'http://localhost/pos/public/kategori/getUbah',
            data: { id_kategori: id_kategori },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama_kategori').val(data.nama_kategori);
                $('#id_kategori').val(data.id_kategori);
            }
        });
    }); 

});
