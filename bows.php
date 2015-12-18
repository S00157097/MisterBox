<?PHP
    require_once('db.php');
    
    $bowId = array();
    $width = array();
    $price = array();

    $sql = "SELECT COUNT(*) AS Total FROM BowTbl;";
    $result = mysqli_fetch_assoc(mysqli_query($dbc, $sql));

    $count = $result['Total'];

    $sql2 = "SELECT BowID, Width, Price FROM BowTbl;";
    $result2 = mysqli_query($dbc, $sql2);

    $i = 0;
    while($row = mysqli_fetch_assoc($result2)) {
        $bowId[$i] = $row['BowID'];
        $width[$i] = $row['Width'];
        $price[$i] = $row['Price'];
        $i++;
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>MrBox | Bows</title>

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
            echo '<script> CreateBows('.$count.', '.json_encode($bowId).', '.json_encode($width).', '.json_encode($price).'); </script>';
        ?>
    </body>
</html>