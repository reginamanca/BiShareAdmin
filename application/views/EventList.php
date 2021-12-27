<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EVENT LIST</h1>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header ">
            <div class="text-center text-danger">
                <?php echo $error ?>
            </div>
            <a href="<?php echo site_url('Event/EventForm') ?>" class="btn btn-primary  btn-icon-split">

                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add</span>
            </a>
            <a href="<?php echo site_url('Event/pdf') ?>" class="btn btn-danger   btn-icon-split">
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
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1; ?>
                        <?php foreach($event as $row): ?>

                        <tr>
                            <?php if($row['dlt']) continue; ?>
                            <td><?php echo $i++; ?></td>

                          
                            <td><?php echo $row['eventnama']; ?></td>
                            <td><?php echo $row['eventcode']; ?></td>
                            <td><?php echo $row['eventdesc']; ?></td>                            
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Event/EventForm/'.$row['eventid']) ?>"
                                    class="btn btn-primary btn-circle btn-sm">
                                    <i class="fa fa-link"></i>
                                </a>
                                <button onclick="DeleteData('<?php echo $row['eventnama'] ?>','<?php echo $row['eventid'] ?>')"
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
        type:'error',text:"Event  : " + xusercode,
        showCancelButton: true,
        
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        buttonsStyling: true
    }, function () {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Event/Delete') ?>",
                data: {
                    'eventid': xuserid
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