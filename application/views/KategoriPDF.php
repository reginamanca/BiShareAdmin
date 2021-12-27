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

<h2 align="center" color="#FF4500">DATA USER BISHARE MARKETPLACE POLIBATAM </h2>
    <table align="center" border="1">
      
        <tr >
            <th>No</th>
            <th>Code</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
        </tr>

        <?php
        $no= 1;
        foreach ($kategori as $kategori): ?>
           <?php if($kategori == NULL){
               continue;
           } ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $kategori['kategoricode'] ?></td>
            <td><?php echo $kategori['kategoriname'] ?></td>
            <td><?php echo $kategori['kategoridesc'] ?></td>
        </tr>

        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script> 

</body></html>