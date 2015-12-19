<?PHP
    require_once('db.php');

    $sql = "SELECT BoxSize, BoxLength, BoxWidth, BoxHeight, Price FROM BoxTbl WHERE BoxType = '". $_GET['box'] ."' ORDER BY Price ASC;";
    $result = mysqli_query($dbc, $sql);

    mysqli_close($dbc);
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

                <div id="items">
                    <?PHP
                        while($row = mysqli_fetch_array($result)) {
                            echo '<div class="item" style="background-image: url(media/boxes/'. $_GET['box'] .'/'. $_GET['box'] .'1.jpg);">';
                            echo '<span class="price">'. $row[4] .'</span>';
                            echo '<span class="width">'.  $row[1] .' x '. $row[2] .' x '. $row[3] .'</span>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </main>
        </div>
        
        <script type="text/javascript" src="script/script.js"></script>
        <script type="text/javascript" src="script/script2.js"></script>
        
        <?PHP include "assets/footer.html"; ?>
    </body>
</html>