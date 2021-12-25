<!DOCTYPE html>
<html><head>
    <title></title>
    <style>
        .line-title{
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
        table, th, td {
  border: 0px solid black;
  text-align : left;
  width : 250px;
  font : arial;
} 
</style>
</head><body> 
 <img src="bi.jpg" style="position: absolute; width: 80px; height: 60;"> 
<table style="width: 100%;">
    <tr>
        <td align="center">
            <span style="line-height: 1.6; font-wight: blod;">
            BISHARE
            <br>MARKETPLACE POLIBATAM
    </span>
    </td>
    </tr>
    </table>
    
    <hr class="line-title">
    <p align="center">
        LAPORAN PEMBELIAN BARANG
    </p>
    <table  >
    <tr>
       
            <th>Code</th>
            <th>:<?php echo $invoice['belidate'] ?></th>
    </tr>
    <tr>
            <th>User Name</th>
            <th>:<?php echo $invoice['username'] ?></th>
    </tr>    
    <tr>    
            <th>Nama Lengkap</th>
            <th>:<?php echo $invoice['namalengkap'] ?></th>
    </tr>
    <tr>
            <th>Alamat</th>
            <th>:<?php echo $invoice['alamat'] ?></th>
    </tr> 
    <tr>    
            <th>Catatan</th>
            <th>:<?php echo $invoice['catatan'] ?></th>
    </tr>
    <hr> 
    </table>
    <table  >
   
   <tr>    
           <th>Metode Pengiriman</th>
           <th>:<?php echo $invoice['metodepengiriman'] ?></th>
   </tr>
   <tr>
           <th>Metode Pembayaran</th>
           <th>:<?php echo $invoice['metodepembayaran'] ?></th>
   </tr>    
   <hr> 
   </table>
   <table  >
   
   <tr>    
           <th>Produk</th>
           <th>:<?php foreach($invoice['produklist'] as $row); ?><?php echo $row['produkname'] ?></th>
   </tr>
   <tr>
           <th>Harga Produk</th>
           <th>:Rp.<?php echo $invoice['hargaproduk'] ?></th>
   </tr>    
   <tr>    
           <th>Harga Ongkir</th>
           <th>:Rp.<?php echo $invoice['hargaongkir'] ?></th>
   </tr>
   <tr>
           <th>Biaya Admin</th>
           <th>:Rp.<?php echo $invoice['hargaadmin'] ?></th>
   </tr> 
   <tr>    
           <th>Total harga</th>
           <th>:Rp.<?php echo $invoice['totalharga'] ?></th>
   </tr>
   <hr> 
   </table>   

</body></html>