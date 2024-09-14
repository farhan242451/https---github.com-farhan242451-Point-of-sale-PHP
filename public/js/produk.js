$(function() {
    // Set modal for adding product
    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Produk');
        $('#formProduk').attr('action', 'http://localhost/pos/public/produk/tambah');
        $('#id_produk').val('');
        $('#nama_produk').val('');
        $('#harga').val('');
        $('#stok').val('');
        $('#id_kategori').val('');
        $('#foto_produk').val('');
        $('#previewFoto').hide(); // Hide the preview image
    });

    // Set modal for editing product
    $('.tombolUbahData').on('click', function() {
        $('#formModalLabel').html('Ubah Produk');
        $('#formProduk').attr('action', 'http://localhost/pos/public/produk/ubah');
    
        const id_produk = $(this).data('id');
        console.log("ID Produk:", id_produk); // Debugging
    
        $.ajax({
            url: 'http://localhost/pos/public/produk/getUbah',
            method: 'post',
            data: { id_produk: id_produk },
            dataType: 'json',
            success: function(data) {
                console.log("Data Produk:", data); // Debugging
                $('#id_produk').val(data.id_produk);
                $('#nama_produk').val(data.nama_produk);
                $('#harga').val(data.harga);
                $('#stok').val(data.stok);
                $('#id_kategori').val(data.id_kategori);
    
                // Set image preview
                if (data.foto_produk) {
                    $('#previewFoto').attr('src', 'data:image/jpeg;base64,' + data.foto_produk).show();
                } else {
                    $('#previewFoto').hide();
                }
            }
        });
    });

    // Preview the image before upload
    $('#foto_produk').on('change', function() {
        const file = this.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            $('#previewFoto').attr('src', e.target.result).show();
        }

        reader.readAsDataURL(file);
    });
});
