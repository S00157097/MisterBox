<?PHP
    require_once('db.php');

    $boxType = array();
    $boxSize = array();
    $boxWidth = array();
    $boxPrice = array();

    $sql = "SELECT BoxType, BoxSize, BoxLength, BoxWidth, BoxHeight, Price FROM BoxTbl;";
    $result = mysqli_query($dbc, $sql);
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $boxType[$i] = $row['BoxType'];
        $boxSize[$i] = $row['BoxSize'];
        $boxWidth[$i] = $row['BoxLength'] .' x '. $row['BoxWidth'] .' x '. $row['BoxHeight'];
        $boxPrice[$i] = $row['Price'];
        $i++;
    }
          
            
    $ribbonId = array();
    $ribbonWidth = array();
    $ribbonPrice = array();

    $sql = "SELECT RibbonID, Width, Price FROM RibbonTbl;";
    $result = mysqli_query($dbc, $sql);
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $ribbonId[$i] = $row['RibbonID'];
        $ribbonWidth[$i] = $row['Width'];
        $ribbonPrice[$i] = $row['Price'];
        $i++;
    }

    $bowId = array();
    $bowWidth = array();
    $bowPrice = array();
    
    $sql = "SELECT BowID, Width, Price FROM BowTbl;";
    $result = mysqli_query($dbc, $sql);   
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $bowId[$i] = $row['BowID'];
        $bowWidth[$i] = $row['Width'];
        $bowPrice[$i] = $row['Price'];
        $i++;
    }

    $butterId = array();
    $butterWidth = array();
    $butterPrice = array();
    
    $sql = "SELECT ButterflyID, Width, Price FROM ButterflyTbl;";
    $result = mysqli_query($dbc, $sql);    
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $butterId[$i] = $row['ButterflyID'];
        $butterWidth[$i] = $row['Width'];
        $butterPrice[$i] = $row['Price'];
        $i++;
    }

    $usedItems = array();

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>MrBox | Products</title>

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
                        $length = 15;    
                    
                        for($i = 0; $i < $length; $i++) {
                            $rand = rand(0, 3);
                            
                            switch($rand) {
                                case 0:
                                    $x = rand(0, sizeof($boxSize) - 1);
                                    if(in_array($boxSize[$x], $usedItems)) {
                                        $length++;
                                        break;
                                    }
                                    array_push($usedItems, $boxSize[$x]);
                                    
                                    echo '<a href="preview.php?prod=Box&id='. $boxSize[$x] .'"><div class="item" style="background-image: url(media/boxes/'. $boxType[$x] .'/'. $boxType[$x] .'1.jpg);">';
                                    echo '<span class="type">'. $boxSize[$x] .'</span>';
                                    echo '<span class="price">'. $boxPrice[$x] .'</span>';
                                    echo '<span class="width">'.  $boxWidth[$x] .'</span></div></a>';
                                    break;
                                    
                                case 1:
                                    $x = rand(0, sizeof($ribbonId) - 1);
                                    if(in_array($ribbonId[$x], $usedItems)) {
                                        $length++;
                                        break;
                                    }
                                    array_push($usedItems, $ribbonId[$x]);
                                    
                                    echo '<a href="preview.php?prod=Ribbon&id='. $ribbonId[$x] .'"><div class="item" style="background-image: url(media/ribbons/'. $ribbonWidth[$x] .'/'. $ribbonId[$x] .'.jpg);">';
                                    echo '<span class="price">'. $ribbonPrice[$x] .'</span>';
                                    echo '<span class="width">Width: '.  $ribbonWidth[$x] .'cm</span></div></a>';
                                    break;
                                    
                                case 2:
                                    $x = rand(0, sizeof($bowId) - 1);
                                    if(in_array($bowId[$x], $usedItems)) {
                                        $length++;
                                        break;
                                    }
                                    array_push($usedItems, $bowId[$x]);
                                    
                                    echo '<a href="preview.php?prod=Bow&id='. $bowId[$x] .'"><div class="item" style="background-image: url(media/bows/'. $bowId[$x] .'.jpg);">';
                                    echo '<span class="price">'. $bowPrice[$x] .'</span>';
                                    echo '<span class="width">'. $bowWidth[$x] .'mm</span></div></a>';
                                    break;
                                    
                                case 3:
                                    $x = rand(0, sizeof($butterId) - 1);
                                    if(in_array($butterId[$x], $usedItems)) {
                                        $length++;
                                        break;
                                    }
                                    array_push($usedItems, $butterId[$x]);
                                    
                                    echo '<a href="preview.php?prod=Butterfly&id='. $butterId[$x] .'"><div class="item" style="background-image: url(media/butterflies/'. $butterWidth[$x] .'/'. $butterId[$x] .'.jpg);">';
                                    echo '<span class="price">'. $butterPrice[$x] .'</span>';
                                    echo '<span class="width">Width: '. $butterWidth[$x] .'cm</span></div></a>';
                                    break;
                            }
                        }
                    ?>
                </div>
            </main>
        </div>
        
        <?PHP include "assets/footer.html"; ?>
        
        <script type="text/javascript" src="script/script.js"></script>
        <script type="text/javascript" src="script/script2.js"></script>
    </body>
</html>