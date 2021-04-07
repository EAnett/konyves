<?php
session_start();
require_once "./connect.php";
header("Content-Type:text/html; charset=utf-8");

if(isset($_POST['submit'])) {
    $errors=array();
    $true=true;
    if(empty($_POST['vnev'])) {
        $true=false;
        array_push($errors, "A felhasználó név üres");
    }
    if(empty($_POST['jelszo'])) {
        $true=false;
        array_push($errors, "A jelszó üres");
    }
    if ($true) {
        $vnev = mysqli_real_escape_string($conn, $_POST['vnev']);
        $jelszo = mysqli_real_escape_string($conn, $_POST['jelszo']);
        
        $sql = "SELECT * FROM `vevo` WHERE vnev='$vnev' AND jelszo=md5('$jelszo')";
        $query = $conn->query($sql);
        if(mysqli_num_rows($query)== 1) {
            session_start();
            $_SESSION['vnev'] = $vnev;
            header('location: tartalom.php');
        }
        else {
            array_push($errors, "A felhasználó név és a jelszó párosítása nem megfelelő!");
        }
    }    
}
$conn->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Könyvek</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="konyves.css"/>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Könyv borító<h1>
            </header>
            <div class="container2">
                <h1>Bejelentkezés</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="vnev">Felhasználónév</label>
                        <input type="text" class="form-control" id="vnev" name="vnev">
                    </div>
                    <div class="form-group">
                        <label for="jelszo">Jelszó</label>
                        <input type="password" class="form-control" id="jelszo" name="jelszo">
                    </div>
                    <input value="Bejelentkezés"  type="submit" class="btn btn-primary" id="submit" name="submit" value="submit"/>
                </form>
            </div>
        </div>
        
        <footer>
            &COPY; Erdélyi Anett;
        </footer> 
        <?php
        if(!empty($errors)) {
                foreach ($errors as $key) {
                    echo $key."<br/>";
                }
            }
        ?>
    </body>
</html>

