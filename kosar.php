<h1>Kosár</h1>
<table>
    <form method="POST">
    <?php
        $_SESSION["kosar"] = $_POST["konyvid"];
        $ids = implode(",", $_POST["konyvid"]);
        $sql = "SELECT `id`, `cim`, `ar` FROM `konyvek` WHERE `id` IN (".$ids.")";
        $result = $conn->query($sql);
        $fizetendo = 0;
        while ($row = $result->fetch_assoc()) {
            $td = '<tr><td class="konyvcim">'.$row['cim'].'</td>'
                .'<td class="konyvar text-right">'.$row['ar'].' Ft</td></tr>';
            echo $td;
            $fizetendo +=$row['ar'];
        }
        echo'<tr><td class="text-right">Fizetendő:</td><td>'.$fizetendo.' Ft</td></tr>';

    ?>
</table>
<input type="submit" class="btn btn-primary" value="Fizetés"/>
<input type="hidden" name="fizet" value="true"/>
</form>

