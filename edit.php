<?php
$con = mysqli_connect('localhost', 'root', '', 'crud');

// $id = '';
$username = '';
$message = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM updated WHERE id = '" . $id . "'";
    $result = mysqli_query($con, $sql);
    $rowst = mysqli_fetch_assoc($result);

    // $username = $rowst['username'];
    // $message = $rowst['message'];
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $message = $_POST['message'];

    $sql = "UPDATE updated SET username='$username', message='$message' WHERE id='$id'";
    mysqli_query($con, $sql);

    // Redirect to index.php after updating
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Flatform Edit</title>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="container w-75">
            <form action="" method="post" class="border p-3">
                <div class="mb-3 p-3 text-center bg-info-subtle">
                    <h2>Edit Comments</h2>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="name@example" value="<?php echo $rowst['username']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" cols="30" rows="10"><?php echo $rowst['message']; ?></textarea>
                </div>

                <!-- Include a hidden field for the id -->
                <input type="" name="id" value="<?php echo $rowst['id']; ?>">

                <div class="mb-3">
                    <button type="submit" class="btn bg-primary bg-gradient text-white" name="submit">Upload</button>
                </div>

                <div class="mb-3">
                    <a href="index.php" class="btn btn-dark">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>