<?php
session_start();
require_once './connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Könyvek</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="konyves.css"/>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Könyv rendelés<h1>
                <?php
                    require_once 'menusav.php';
                ?>
            </header>
            <div class="container2">
                <?php
                require_once './vasarlas.php';
                ?>
            </div>
            <div class="container2">
                <form method="POST">
                    <input class="btn btn-primary" type="submit" value="Kosárba">
                    <input type="hidden" name="kosar" value="true">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kép</th>
                            <th>Író</th>
                            <th>Cím</th>
                            <th>Tartalom</th>
                            <th>Megjelenés</th>
                            <th>ISBN</th>
                            <th>Ár</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    $result = $conn->query("SELECT `cim`, `iro`, `ar`, `megjelenes`, `tartalom`, `kep`, `id`, `isbn` FROM `konyvek` WHERE 1");
                    while ($row = $result->fetch_assoc()) {
                        $tartalom = '<ul>';
                        foreach (explode(",", $row['tartalom']) as $value) {
                            $tartalom .= '<p>'.$value.'</p>';
                        }
                        $tartalom .= '</ul>';
                            echo '<tr>'
                                .'<td><img src="images/konyv_'.$row['cim'].'.jpg" class="KonyvKep" alt="konyv_'.$row['cim'].'.jpg" title="'.$row['cim'].'"></td>'
                                .'<td>'.$row['iro'].'</td>'
                                .'<td>'.$row['cim'].'</td>'
                                .'<td>'.$tartalom.'</td>'
                                .'<td>'.$row['megjelenes'].'</td>'
                                .'<td>'.$row['isbn'].'</td>'
                                .'<td>'.$row['ar'].'</td>'
                                .'<td><input type="checkbox" name="konyvid[]" value="'.$row['id'].'"></td>'
                            .'</tr>';
                    }
                    ?>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
        
        <footer>
            &COPY; Erdélyi Anett;
        </footer> 
        <?php
        
        ?>
    </body>
</html>

