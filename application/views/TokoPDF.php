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

<h2 align="center" color="#FF4500">DATA TOKO BISHARE MARKETPLACE POLIBATAM </h2>
    <table align="center" border="1">
      
        <tr >
            <th>No</th>
            <th>Code</th>
            <th>Nama Toko</th>
            <th>Start Date</th>
        </tr>
        <?php
        $no= 1;
        foreach ($toko as $toko): ?>
           <?php if($toko == NULL){
               continue;
           } ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $toko['tokocode'] ?></td>
            <td><?php echo $toko['tokoname'] ?></td>
            <td><?php echo $toko['tokodate'] ?></td>
        </tr>

        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script> 

</body></html>