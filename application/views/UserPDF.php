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
            <th>Id</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Status</th>
            <th>Start Date</th>
        </tr>
        <?php
        $no= 1;
        foreach ($user as $user): ?>
           <?php if(isset($user['userid']) == null){
                continue;
            } ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $user['usercode'] ?></td>
            <td><?php echo $user['userid'] ?></td>
            <td><?php echo $user['nama'] ?></td>
            <td><?php echo $user['username'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['nohp'] ?></td>
            <td><?php echo $user['status'] ?></td>
            <td><?php echo $user['userdate'] ?></td>
        </tr>

        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script> 

</body></html>