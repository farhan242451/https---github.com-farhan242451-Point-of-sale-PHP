<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struk Transaksi</title>
    <style>
        /* Add some basic styling to the receipt */
        .receipt {
            width: 80mm;
            margin: 0 auto;
            padding: 10px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Add some basic styling to the table */
        .receipt table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            font-size: 12px;
            color: #333;
        }

        /* Add some basic styling to the table headers and cells */
        .receipt th,
        .receipt td {
            padding: 5px;
            text-align: left;
            border: 1px solid #ddd;
        }

        /* Add some basic styling to the table headers */
        .receipt th {
            background-color: #f9f9f9;
        }

        /* Add some basic styling to the total section */
        .receipt .total {
            font-weight: bold;
            text-align: right;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }

        /* Add some basic styling to the footer section */
        .receipt .footer {
            margin-top: 10px;
            font-size: 10px;
            color: #888;
        }

        /* Add some basic styling to the print media */
        @media print {
            .receipt {
                box-shadow: none;
                border: none;
            }

            .footer {
                page-break-before: always;
            }
        }
    </style>
</head>

<body>
    <div class="receipt">
        <h1 class="text-center">Struk Transaksi</h1>
        <p><span class="font-weight-bold">Nama Pelanggan:</span> <?= htmlspecialchars($data['transaksi']['customer_name']); ?></p>
        <p><span class="font-weight-bold">Total Pembelian:</span> Rp <?= number_format($data['transaksi']['total_price'], 2); ?></p>
        <p><span class="font-weight-bold">Uang Pelanggan:</span> Rp <?= number_format($data['transaksi']['uang_customer'], 2); ?></p>
        <p><span class="font-weight-bold">Uang Kembali:</span> Rp <?= number_format($data['transaksi']['uang_kembali'], 2); ?></p>

        <h3 class="text-center">Detail Transaksi</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['transaksi']['cart'] as $item) : ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']); ?></td>
                        <td><?= htmlspecialchars($item['quantity']); ?></td>
                        <td>Rp <?= number_format($item['price'], 2); ?></td>
                        <td>Rp <?= number_format($item['subtotal'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total text-right">
            Total: Rp <?= number_format($data['transaksi']['total_price'], 2); ?>
        </div>

        <div class="footer text-center">
            Terima kasih telah berbelanja di toko kami. Kunjungi kami lagi!
        </div>
    </div>

    <script>
        function printAndReturn() {
            window.print();

            // Menambahkan event listener untuk event afterprint
            window.onafterprint = function() {
                // Kembali ke halaman kasir setelah pencetakan selesai
                window.location.href = 'http://localhost/pos/public/kasir';
            };
        }

        // Panggil fungsi ketika halaman dimuat
        window.onload = function() {
            printAndReturn();
        };
    </script>
</body>

</html>