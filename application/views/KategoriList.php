<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">KATEGORI LIST</h1>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header ">
            <div class="text-center text-danger">
                <?php echo $error ?>
            </div>
            <a href="<?php echo site_url('Kategori/KategoriForm') ?>" class="btn btn-primary  btn-icon-split">

                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add</span>
            </a>
            <a href="<?php echo site_url('kategori/pdf') ?>" class="btn btn-danger   btn-icon-split">
<span class="icon text-white-50">
    <i class="fas fa-file"></i>
</span>
<span class="text">Export PDF</span>
</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1; ?>
                        <?php foreach($kategori as $row): ?>

                        <tr>
                            <?php if($row['dlt']) continue; ?>
                            <td><?php echo $i++; ?></td>

                            <td><?php echo $row['kategoricode']; ?></td>
                            <td><?php echo $row['kategoriname']; ?></td>
                            <td><?php echo $row['kategoridesc']; ?></td>
                            
                            <td>
                                <a href="<?php echo site_url('Kategori/KategoriForm/'.$row['kategoriid']) ?>"
                                    class="btn btn-primary btn-circle btn-sm">
                                    <i class="fa fa-link"></i>
                                </a>
                                <button onclick="DeleteData('<?php echo $row['kategoricode'] ?>','<?php echo $row['kategoriid'] ?>')"
                                    class="btn btn-danger btn-circle btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});

function DeleteData(xusercode, xuserid) {
    swal({
        title: "Apakah anda yakin untuk menghapus",
        type:'error',text:"Kategori code : " + xusercode,
        showCancelButton: true,
        
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        buttonsStyling: true
    }, function () {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Kategori/Delete') ?>",
                data: {
                    'kategoriid': xuserid
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
<!-- /.container-fluid -->