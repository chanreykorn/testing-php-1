<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
        $server = mysqli_connect('localhost', 'root', '', 'crud');
        $show = 'SELECT * FROM updated';
        $res = mysqli_query($server, $show);


        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $qury = "DELETE FROM updated  WHERE id = $id";
            $ri = mysqli_query($server, $qury);
            header('Location: views.php?');
        }
    ?>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="container">
            <form action="index.php" method="post" class="border p-3">
                <div class="mb-3">
                    <a href="index.php" class="btn">
                        <button class="btn">Back Up</button>
                    </a>
                </div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $num = mysqli_num_rows($res);
                            while($row = mysqli_fetch_assoc($res)){
                                ?>
                                    <tr>
                                        <th> <?php echo $row['id'] ?> </th>
                                        <td> <?php echo $row['username'] ?> </td>
                                        <td> <?php echo $row['message'] ?> </td>
                                        <td>
                                            <a href="views.php? id=<?php echo $row['id'] ?>">
                                                <i class="fa-solid fa-trash-can"></i>                                       
                                           </a>
                                           <a href="edit.php? id=<?php echo $row['id'] ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>                                        
                                           </a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>

</html>