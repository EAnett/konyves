<?php

//--beszúrás a rendelésbe: $_SESSION["user"]["vazon"]
$sql = "INSERT INTO `eladas` (`vevoId`, `konyvId`, `datum`) VALUES ([$vevoId], [$konyvId], NOW())";
$result= $conn->query($sql);

$vevoId=$conn->insert_id;
foreach ($_SESSION["kosar"] as $value) {
        $sql = "INSERT INTO `eladas` (`vevoId`) VALUES (".$vevoId.", 1)";
    $conn->query($sql);
}
echo 'A rendelés megtörtént';
?>
