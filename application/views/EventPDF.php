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
</style>
</head><body>

<h2 align="center" color="#FF4500">LAPORAN EVENT BISHARE MARKETPLACE POLIBATAM </h2>
<br/>
    <table align="center" border="1" >
      
        <tr >
            <th>No</th>
            <th>ID</th>
            <th>Tahun</th>
            <th>JudulEvent</th>
            <th>Deskripsi</th>
            <th>Status</th>
        </tr>
        <?php
        $no= 1;
        foreach ($event as $event): ?>
           <?php if($event == NULL){
               continue;
           } ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $event['eventcode'] ?></td>
            <td><?php echo $event['eventid'] ?></td>
            <td><?php echo $event['eventnama'] ?></td>
            <td><?php echo $event['eventdesc'] ?></td>
            <td><?php echo $event['status'] ?></td>
        </tr>

        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script> 

</body></html>