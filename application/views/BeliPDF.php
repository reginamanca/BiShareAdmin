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
    <table border="1" >
      
        <tr >
            <th>No</th>
            <th>Code</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Catatan</th>
            <th>Harga Produk</th>
            <th>Harga Ongkir</th>
            <th>Biaya Admin</th>
            <th>Total Harga</th>
            <th>Metode Pengiriman</th>
            <th>Metode Pembayaran</th>
            <th>Nama Bank</th>
            <th>Nama Rekening</th>
            <th>No Rekening</th>
            <th>Tanggal Pembayaran</th>
        </tr>
        <?php
        $no= 1;
        foreach ($beli as $beli): ?>
           <?php if($beli == NULL){
               continue;
           } ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $beli['belidate'] ?></td>
            <td><?php echo $beli['username'] ?></td>
            <td><?php echo $beli['namalengkap'] ?></td>
            <td><?php echo $beli['alamat'] ?></td>
            <td><?php echo $beli['catatan'] ?></td>
            <td><?php echo $beli['hargaproduk'] ?></td>
            <td><?php echo $beli['hargaongkir'] ?></td>
            <td><?php echo $beli['hargaadmin'] ?></td>
            <td><?php echo $beli['totalharga'] ?></td>
            <td><?php echo $beli['metodepengiriman'] ?></td>
            <td><?php echo $beli['metodepembayaran'] ?></td>
            <td><?php echo $beli['pembayaranbank'] ?></td>
            <td><?php echo $beli['pembayarannama'] ?></td>
            <td><?php echo $beli['pembayarannorek'] ?></td>
            <td><?php echo $beli['pembayarantanggal'] ?></td>
        </tr>

        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script> 

</body></html>