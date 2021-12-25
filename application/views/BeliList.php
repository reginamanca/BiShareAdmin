<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pembelian </h1>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header ">    
 <a href="<?php echo site_url('Beli/pdf') ?>" class="btn btn-danger   btn-icon-split">
<span class="icon text-white-50">
    <i class="fas fa-file"></i>
</span>
<span class="text">Export PDF</span>
</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Username</th>
                            <th>Harga Barang</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $i= 1; ?>
                        <?php foreach($beli as $row): ?>

                        <tr>
                            <?php if($row['dlt']) continue; ?>
                            <td><?php echo $i++; ?></td>

                            <td><?php echo $row['belidate']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['totalharga']; ?></td>

                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Beli/BeliForm/'.$row['key'].'/'.$row['tokoid']) ?>"
                                    class="btn btn-primary btn-circle btn-sm">
                                    <i class="fa fa-link"></i>
                                </a>
                                <button
                                    onclick="DeleteData('<?php echo $row['tokoname'] ?>','<?php echo $row['belidate'] ?>')"
                                    class="btn btn-danger btn-circle btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});

function DeleteData(xusercode, xbelicode) {
    debugger
    swal({
        title: "Apakah anda yakin untuk menghapus",
        type:'error',text:"Beli code : " + xbelicode,
        showCancelButton: true,
        
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        buttonsStyling: true
    },function() {
        console.log('sada')
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Beli/Delete') ?>",
                data: {
                    belicode: xbelicode
                },
                cache: false,
                success: function(response) {
                    console.log(response);
                    if(response['success']){
                        swal(
                        "Success!",
                        "Data telah terhapus!",
                        "success"
                    );
                    location.reload(); 
                    }
                    else {

                        swal(
                        response['head'],
                        response['text'],
                        "error"
                    ); 
                    }
                    
                },
                failure: function(response) {
                    swal(
                        "Internal Error",
                        "Oops, your note was not saved.", // had a missing comma
                        "error"
                    )
                }
            });
        });
}
</script>