<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <table>
        <tr>
            <th>NO</th>
            <th>CODE</th>
            <th>NAME</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>START DATE</th>
            <th>STATUS</th>
        </tr>

        <?php
        $no= 1;
        foreach (User as user): ?>

        <tr>
            <td><?php echo $no++</td>
            <td><?php echo $user->code</td>
            <td><?php echo $user->name</td>
            <td><?php echo $user->username</td>
            <td><?php echo $user->email</td>
            <td><?php echo $user->startdate</td>
            <td><?php echo $user->status</td>
        </tr>

        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script> 

</body>
</html>
