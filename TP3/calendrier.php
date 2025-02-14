<?php
require_once('config.php');
$squery="select * from rendez_vous";
$where = mysqli_query($con,$squery);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $RESEARCH = $_POST["Research"];
    $fquery = "SELECT * FROM passwords WHERE application = ?;";
    $stmt = $con->prepare($fquery);
    $stmt->bind_param("s", $RESEARCH);
    $stmt->execute();
    $stmt->bind_result($col1, $col2, $col3);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Calendrier</title>
</head>
<body>
    <form class="center-text" action="Research_table.inc.php" method="post">
        <input type="text" name="Research" placeholder="Research" required>
        <button>Ok</button>
    </form>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Password list</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>Application</td>
                                <td>Password</td>
                                <!--<td>Copy</td>-->
                                <td>Delete</td>
                            </tr>
                            <tr>
                            <?php
                            while($stmt->fetch())
                            {
                                ?>
                                <td><?php echo $col2; ?></td>
                                <td id=<?php echo $col1;?>><?php echo $col3; ?></td>
                                <!--<td><a onclick="Copy('<?php echo $col3; ?>')" class="btn btn-success">Copy</a></td>-->
                                <td><a href="delete.inc.php?id=<?php echo $col1;?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                                <?php
                            }
                            $stmt->close();
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>