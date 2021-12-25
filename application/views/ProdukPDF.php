<!DOCTYPE html>
<html><head>
    <title></title>
    <style>
    table {
        width : 100%;
    }
        th, td {
        text-align : center;
        width : 60px;
        align : center;
        font : arial;
    }
</style>
</head><body>

<h2 align="center" color="#FF4500">DATA PEMBELIAN BISHARE MARKETPLACE POLIBATAM </h2>
    <table align="center" border="1">
      
        <tr >
            <th>No</th>
            <th>Code</th>
            <th>Nama Toko</th>
            <th>Nama Produk</th>
            <th>Date</th>
            <th>Kategori</th>
            <th>Harag</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Fitur</th>
            <th>Spesifikasi</th>
            <th>Video Youtube</th>
           
        </tr>
        <?php
        $no= 1;
        // var_dump($produks);
        foreach ($produks as $produk): ?>
            <?php if(isset($produk['tokoname']) == null){
                continue;
            } ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $produk['produkcode'] ?></td>
            <td><?php echo $produk['tokoname'] ?></td>
            <td><?php echo $produk['produkname'] ?></td>
            <td><?php echo $produk['produkdate'] ?></td>
            <td><?php echo $produk['kategoriname'] ?></td>
            <td><?php echo $produk['harga'] ?></td>
            <td><?php echo $produk['stok'] ?></td>
            <td><?php echo $produk['deskripsi'] ?></td>
            <td><?php echo $produk['fitur'] ?></td>
            <td><?php echo $produk['spesifikasi'] ?></td>
            <td><?php echo $produk['youtubevideo'] ?></td>

        </tr>

        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script> 

</body></html>