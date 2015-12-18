<?PHP
    require_once('db.php');

    $size = array();
    $price = array();
    $length = array();
    $width = array();
    $height = array();

    $sql = "SELECT COUNT(*) AS total FROM BoxTbl WHERE BoxType = '". $_GET['box'] ."';";
    $result = mysqli_fetch_assoc(mysqli_query($dbc, $sql));

    $count = $result['total'];

    $sql2 = "SELECT BoxSize, BoxLength, BoxWidth, BoxHeight, Price FROM BoxTbl WHERE BoxType = '". $_GET['box'] ."' ORDER BY Price ASC;";
    $result2 = mysqli_query($dbc, $sql2);

    $i = 0;
    while($row = mysqli_fetch_assoc($result2)) {
        $size[$i] = $row['BoxSize'];
        $price[$i] = $row['Price'];
        $length[$i] = $row['BoxLength'];
        $width[$i] = $row['BoxWidth'];
        $height[$i] = $row['BoxHeight'];
        $i++;
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>MrBox | <?PHP echo $_GET['box']; ?></title>

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
        
            echo '<script> CreateBoxes('.$count.', '.json_encode($size).', '.json_encode($price).', "'.$_GET['box'].'", '.json_encode($length).', '.json_encode($width).', '.json_encode($height).'); </script>';
        ?>
    </body>
</html>