<?php
require_once('config.php');
$fquery="select * from user_data";
$table = mysqli_query($con,$fquery);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;
        background-color: #f0f2f3;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size : 100% 100%;}
      * {box-sizing: border-box;}

        .center-text {text-align: center;}

        .center-button {
        display: flex;
        justify-content: center;
        align-items: center;
        }

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Réservation</title>
</head>
<body>
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
                                <td>Jour</td>
                                <td>Heure</td>
                                <td>Annulation</td>
                            </tr>
                            <tr>
                            <?php
                            while($row=mysqli_fetch_assoc($table))
                            {
                                if($row['user_id'] == $USER)
                                {
                                    ?>
                                    <td><?php echo $row['jour']; ?></td>
                                    <td><?php echo $row['heure']; ?></td>
                                    <td><a href="annulation.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Annuler</a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>