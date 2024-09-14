
$(function(){

    $('.tombolTambahTransaksi').on('click',function(){

        $('#formModalLabel').html('Tambah Data Transaksi');
        $('.modal-footer button[type=submit]').html('Save');
    });

    $('.tombolUbahTransaksi').on('click', function() {

        $('#formModalLabel').html('Ubah Data Transaksi');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/pos/public/transaksi/ubah');

        const id_transaksi = $(this).data('id');

        $.ajax({
            url: 'http://localhost/pos/public/transaksi/getUbah',
            data: { id_transaksi: id_transaksi },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_transaksi').val(data.id_transaksi);
                $('#id_pelanggan').val(data.id_pelanggan);
                $('#tanggal_transaksi').val(data.tanggal_transaksi);
                $('#total_harga').val(data.total_harga);
            }
        });
    }); 

});

