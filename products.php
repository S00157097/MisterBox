<?PHP
    require_once('db.php');

    $list = array(
        array(
            '<div class="item" style="background-image: url(media/boxes/F/F1.jpg);">',
            '<span class="type">F1</span>',
            '<span class="price">11.11</span>',
            '<span class="width">99 x 99 x 99</span></div>'
             ),
        array(
            '<div class="item" style="background-image: url(media/ribbons/3/30110C.jpg);">',
            '<span class="price">11.11</span>',
            '<span class="width">Width: 00cm</span></div>'
        ),
        array(
            '<div class="item" style="background-image: url(media/bows/0240.jpg);">',
            '<span class="price">11.11</span>',
            '<span class="width">000mm</span></div>'
        ),
        array(
            '<div class="item" style="background-image: url(media/butterflies/5/388.jpg);">',
            '<span class="price">99.99</span>',
            '<span class="width">Width: 10cm</span></div>'
        )
    );

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
                        for($i = 0; $i < 15; $i++) {
                            $rNum = rand(0,3);
                            
                            echo $list[$rNum][0];
                            echo $list[$rNum][1];
                            echo $list[$rNum][2];
                            if($rNum == 0) echo $list[$rNum][3];
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