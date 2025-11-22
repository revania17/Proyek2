<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 6px; }
        th { background-color: #f2f2f2; font-weight: bold; text-align: center; }
        .title { text-align: center; font-size: 16px; font-weight: bold; margin-bottom: 10px; }
        .right { text-align: right; }
    </style>
</head>
<body>

    <div class="title">Laporan Penjualan Creative Cell</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Nama Produk</th>
                <th>Provider</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Nomor Telepon</th>
                <th>Tanggal Pesanan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; $total = 0; ?>
            <?php foreach ($data as $d): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['nama_lengkap'] ?></td>
                    <td><?= $d['nama_produk'] ?></td>
                    <td><?= $d['provider'] ?></td>
                    <td><?= $d['deskripsi'] ?></td>
                    <td>Rp <?= number_format($d['harga_produk'], 0, ',', '.') ?></td>
                    <td><?= $d['nomor_telepon'] ?></td>
                    <td><?= $d['dibuat'] ?></td>
                </tr>
                <?php $total += $d['harga_produk']; ?>
            <?php endforeach; ?>

            <!-- Total Pendapatan -->
            <tr>
                <td colspan="5" class="right"><strong>Total Pendapatan</strong></td>
                <td><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>

</body>
</html>