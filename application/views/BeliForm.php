<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pembeli </h1>

    </div>
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="text-center text-danger">
                <?php echo $error ?>
            </div>
            <form action="<?php echo site_url('beli/Save/'.$beli['key']."/".$beli['tokoid']) ?>" method="post">
                <input type="hidden" name="belidate" value="" />

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="belidate" class="form-control" value="<?php echo $beli['belidate'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" value="<?php echo $beli['username'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" name="namalengkap" class="form-control" value="<?php echo $beli['namalengkap'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat" class="form-control" value="<?php echo $beli['alamat'] ?>"
                            readonly>
                    </div>
                </div>
          
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                        <input type="text" name="catatan" class="form-control" value="<?php echo $beli['catatan'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-sm-10">
                    <?php foreach($beli['produklist'] as $row); ?>
                        <input type="text" name="produkname" class="form-control" value="<?php echo $row['produkname'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Harga Produk</label>
                    <div class="col-sm-10">
                        <input type="text" name="hargaproduk" class="form-control" value="<?php echo $beli['hargaproduk'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Harga Ongkir</label>
                    <div class="col-sm-10">
                    <input type="number" name="hargaongkir" class="form-control" value="<?php echo $beli['hargaongkir'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Biaya Admin</label>
                    <div class="col-sm-10">
                        <input type="text" name="hargaadmin" class="form-control" value="<?php echo $beli['hargaadmin'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Total harga</label>
                    <div class="col-sm-10">
                        <input type="text" name="totalharga" class="form-control" value="<?php echo $beli['totalharga'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Metode Pengiriman</label>
                    <div class="col-sm-10">
                        <input type="text" name="metodepengiriman" class="form-control" value="<?php echo $beli['metodepengiriman'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Metode Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="text" name="metodepembayaran" class="form-control" value="<?php echo $beli['metodepembayaran'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Bank</label>
                    <div class="col-sm-10">
                        <input type="text" name="pembayaranbank" class="form-control" value="<?php echo $beli['pembayaranbank'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Rekening</label>
                    <div class="col-sm-10">
                        <input type="text" name="pembayarannama" class="form-control" value="<?php echo $beli['pembayarannama'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nomor Rekening</label>
                    <div class="col-sm-10">
                        <input type="text" name="pembayarannorek" class="form-control" value="<?php echo $beli['pembayarannorek'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="text" name="pembayarantanggal" class="form-control" value="<?php echo $beli['pembayarantanggal'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" name="status" class="form-control" value="<?php echo $beli['status'] ?>"
                            readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Komen Penjual</label>
                    <div class="col-sm-10">
                        <input type="text" name="komenpenjual" class="form-control" value="<?php echo $beli['komenpenjual'] ?>"
                            >
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Ubah Status</label>
                    <div class="col-sm-10">
                    <select name="status" id="" class="form-control mb-3" value="<?php echo $beli['status'] ?>">
                    <option value="Penjual Batal">Penjual Batal</option>
                    <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                    <option value="Proses Pengiriman">Proses Pengiriman</option>
                    <option value="Menunggu Pesanan Diterima">Menunggu Pesanan Diterima</option>
                    <option value="Selesai">Selesai</option>
                    </select>
                     
                    </div>
                </div>
              <button type="submit" class="btn btn-success  btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                        <span class="text">Save</span>     
              </button>  
              <a href="<?php echo site_url('Beli/invoice/'.$beli['key']) ?>" class="btn btn-warning  btn-icon-split">

                    <span class="icon text-white-50">
                        <i class="fas fa-file"></i>
                    </span>
                    <span class="text">Rincian Transaksi</span>
              </a>
               
 
                   
    </div>

  
              

</div>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();

});

</script>
<!-- /.container-fluid -->