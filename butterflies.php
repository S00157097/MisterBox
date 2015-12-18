<?PHP
    require_once('db.php');

    $buttId = array();
    $price = array();

    $sql = "SELECT COUNT(*) AS total FROM ButterflyTbl WHERE Width = '". $_GET['butterfly'] ."';";
    $result = mysqli_fetch_assoc(mysqli_query($dbc, $sql));

    $count = $result['total'];

    $sql2 = "SELECT ButterflyID, Price FROM ButterflyTbl WHERE Width = '". $_GET['butterfly'] ."' ORDER BY Price ASC;";
    $result2 = mysqli_query($dbc, $sql2);

    $i = 0;
    while($row = mysqli_fetch_assoc($result2)) {
        $buttId[$i] = $row['ButterflyID'];
        $price[$i] = $row['Price'];
        $i++;
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>MrBox | <?PHP echo $_GET['butterfly'].'cm';?></title>

        <meta name="author" content="Maris Orols" />
        <meta name="description" content="Variety of products ve are selling." />
        <meta name="keywords" content="boxes, bows, ribbons, mainpage, home" />

        <link rel="stylesheet" type="text/css" href="style/main.css" />
        
        <?PHP include "assets/head.html"; ?>
    </head>

    <body>
        <?PHP include "assets/nav.html"; ?>
        
        
        <div id="container">
            <main>
                <?PHP include "assets/aside.html"; ?>

                <div id="items"></div>
            </main>
        </div>
        
        <script type="text/javascript" src="script/script.js"></script>
        <script type="text/javascript" src="script/script2.js"></script>
        
        <?PHP include "assets/footer.html"; ?>
        
        <?PHP
            echo '<script> CreateItems('.$count.', '.json_encode($buttId).', '.json_encode($price).', "'.$_GET['butterfly'].'", "butterflies"); </script>';
        ?>
    </body>
</html>