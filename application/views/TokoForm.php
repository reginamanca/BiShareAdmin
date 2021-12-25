<!-- Begin Page Content -->
<?php 
$inputVisibility = 'readonly';
if($userid == $toko['userid'] || $status =='admin'){
    $inputVisibility = 'required';
}
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Toko Formulir </h1>

    </div>
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="text-center text-danger">
                <?php echo $error ?>
            </div>
            <form action="<?php echo site_url('Toko/Save') ?>" method="post">
                <input type="hidden" name="tokoid" value="<?php echo $toko['tokoid'] ?>" />
                <input type="hidden" name="userid" value="<?php echo $toko['userid'] ?>" />
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Pemilik</label>
                    <div class="col-sm-10">
                        <input type="text" name="usernama" class="form-control" value="<?php echo $toko['usernama'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" name="status" class="form-control" value="<?php echo $toko['status'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="tokocode" class="form-control" value="<?php echo $toko['tokocode'] ?>"
                            readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="text" name="tokodate" class="form-control" value="<?php echo $toko['tokodate'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="tokoname" class="form-control" value="<?php echo $toko['tokoname'] ?>"
                            <?php echo $inputVisibility; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Bank</label>
                    <div class="col-sm-10">
                        <input type="text" name="namabank" class="form-control" value="<?php echo $toko['namabank'] ?>"
                            <?php echo $inputVisibility; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nomor Rekening</label>
                    <div class="col-sm-10">
                        <input type="text" name="nomorreq" class="form-control" value="<?php echo $toko['nomorreq'] ?>"
                            <?php echo $inputVisibility; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <?php 
                        $formcontrol = array(
                            'type' => 'textarea',
                            'id' => 'tokodesc',
                            'name' => 'tokodesc',
                            'class' => 'form-control',
                            'placeholder' => 'Isi Deskripsi',
                            " $inputVisibility"=>'',
                            'value'=> $toko['tokodesc']
                            );
                            echo form_textarea($formcontrol);
                        ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kontak</label>
                    <div class="col-sm-10">
                        <?php 
                        $formcontrol = array(
                            'type' => 'textarea',
                            'id' => 'kontak',
                            'name' => 'kontak',
                            'class' => 'form-control',
                            'placeholder' => 'Isi kontak',
                           
                           " $inputVisibility"=>'',
                            'value'=> $toko['kontak']
                            );
                            echo form_textarea($formcontrol);
                        ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <?php 
                        $formcontrol = array(
                            'type' => 'textarea',
                            'id' => 'alamat',
                            'name' => 'alamat',
                            'class' => 'form-control',
                            'placeholder' => 'Isi alamat',
                           
                           " $inputVisibility"=>'',
                            'value'=> $toko['alamat'] ?? ""
                            );
                            echo form_textarea($formcontrol);
                        ?>
                    </div>
                </div>
                <?php  if($toko['status'] != 'pending'){ ?>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Alasan</label>
                    <div class="col-sm-10">
                        <?php 
                        $formcontrol = array(
                            'type' => 'textarea',
                            'id' => 'alasan',
                            'name' => 'alasan',
                            'class' => 'form-control',
                            'placeholder' => 'Isi alasan',
                           'readonly'=>'',
                            'value'=> $toko['alasan']
                            );
                            echo form_textarea($formcontrol);
                        ?>
                    </div>
                </div>
                <?php } ?>



                <?php  if($inputVisibility == 'required'){ ?>
                <hr>

                <button type="submit" class="btn btn-success  btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    <?php if($toko['status']=='reject'){?>
                    <span class="text">Request Ulang</span>
                    <?php }  else {?>
                    <span class="text">Save</span>
                    <?php }  ?>
                </button>
                <?php } ?>


            </form>
        </div>
        <?php if($status =='admin' && $toko['status'] =='pending' && $toko['tokoid']!= '') {?>
        <div class="card-header">
            <h4>Review</h4>
        </div>
        <div class="card-body">
            <div class="text-center text-danger">
                <?php echo $error ?>
            </div>
            <form action="<?php echo site_url('Toko/Review') ?>" method="post">
                <input type="hidden" name="tokoid" value="<?php echo $toko['tokoid'] ?>" />
                <input type="hidden" name="userid" value="<?php echo $toko['userid'] ?>" />

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Alasan</label>
                    <div class="col-sm-10">
                        <?php 
                        $formcontrol = array(
                            'type' => 'textarea',
                            'id' => 'alasan',
                            'name' => 'alasan',
                            'class' => 'form-control',
                            'placeholder' => 'Isi alasan',
                           'required'=>'',
                            'value'=> $toko['alasan']
                            );
                            echo form_textarea($formcontrol);
                        ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Review</label>
                    <div class="col-sm-10">
                        <?php 
                     $options = array(
                        ''         => 'Pilih salah satu',
                        'approve'         => 'Approve',
                        'reject'           => 'Reject',
                    );
                    echo form_dropdown('status', $options, $toko['status'],'class="form-control" required');
                     ?>

                    </div>

                    <button type="submit" class="btn btn-warning  btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Review</span>
                    </button>
            </form>
        </div><?php }?>
    </div>
</div>




<script>
$(document).ready(function() {
    $('#dataTable').DataTable();

});
</script>
<!-- /.container-fluid -->