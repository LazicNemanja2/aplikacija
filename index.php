<?php
session_start();
if(isset($_SESSION['prijavljen']))
	header("location:stranica.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>

    
        <article>
            <div>
                <section>
                    <?php include "loginforma.php"; ?>
                </section>
                <?php include "registracionaforma.php"; ?>

            </div>

        </article>


 

</body>
</html>