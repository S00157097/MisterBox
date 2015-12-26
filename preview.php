<?PHP
    session_start();
    require_once('db.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title><?PHP echo $_GET['prod']; ?> | Preview</title>

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
               <div id="data">
                   <span class="close">x</span>
                   
                   <dl>
                       <td><label for="fullName">Full Name: </label></td>
                       <dd><input type="text" id="fullName" name="fullName" placeholder="First Name"></dd>
                       
                       <td><label for="phone">Phone: </label></td>
                       <dd><input type="text" id="phone" name="phone" placeholder="Phone"></dd>
                       
                       <td><label for="email">E-Mail</label></td>
                       <dd><input type="text" id="email" name="email" placeholder="someone@mail.com"></dd>
                       
                       <label for="comment">Comment: </label>
                       <textarea name="comment" id="comment" placeholder="Type here"></textarea>
                       
                       <input type="submit" name="submit" id="submit" value="Order">
                   </dl>
               </div>
                <?PHP include "assets/aside.html"; ?>
                
                <div>
                    <?PHP
                        switch($_GET['prod']) {

                            case 'Box':
                                $qry = 'SELECT BoxType, BoxLength, BoxWidth, BoxHeight, Price FROM BoxTbl WHERE BoxSize = "'. $_GET['id'] .'";';
                                $row = mysqli_fetch_row(mysqli_query($dbc, $qry));

                                echo '<div id="view" alt="'. $_GET['prod'] .'">';
                                echo '<div id="view-image" style="background-image: url(media/boxes/'. $row[0] .'/'. $row[0] .'1.jpg);"><span class="view-price">'. $row[4] .'</span></div>';
                                echo '<div id="view-info"><h2>'. $_GET['prod'] .' - '. $_GET['id'] .'</h2>';
                                echo '<span id="dimension">'. $row[1] .' x '. $row[2] .' x '. $row[2] .'</span></div></div>';
                                break;

                            case 'Ribbon':
                                $qry = 'SELECT Width, Price FROM RibbonTbl WHERE RibbonID = "'. $_GET['id'] .'";';
                                $row = mysqli_fetch_row(mysqli_query($dbc, $qry));

                                echo '<div id="view" alt="'. $_GET['prod'] .'">';
                                echo '<div id="view-image" style="background-size: contain;background-image: url(media/ribbons/'. $row[0] .'/'. $_GET['id'] .'.jpg);"><span class="view-price">'. $row[1] .'</span></div>';
                                echo '<div id="view-info"><h2>'. $_GET['prod'] .' - '. $_GET['id'] .'</h2>';
                                echo '<span id="dimension">'. $row[0] .'cm</span></div></div>';
                                break;

                            case 'Bow':
                                $qry = 'SELECT Width, Price FROM BowTbl WHERE BowID = "'. $_GET['id'] .'"';
                                $row = mysqli_fetch_row(mysqli_query($dbc, $qry));

                                echo '<div id="view" alt="'. $_GET['prod'] .'">';
                                echo '<div id="view-image" style="background-image: url(media/bows/'. $_GET['id'] .'.jpg);"><span class="view-price">'. $row[1] .'</span></div>';
                                echo '<div id="view-info"><h2>'. $_GET['prod'] .' - '. $_GET['id'] .'</h2>';
                                echo '<span id="dimension">'. $row[0] .'mm</span></div></div>';
                                break;

                            case 'Butterfly':
                                $qry = 'SELECT Width, Price FROM ButterflyTbl WHERE ButterflyID = "'. $_GET['id'] .'"';
                                $row = mysqli_fetch_row(mysqli_query($dbc, $qry));

                                echo '<div id="view" alt="'. $_GET['prod'] .'">';
                                echo '<div id="view-image" style="background-image: url(media/butterflies/'. $row[0] .'/'. $_GET['id'] .'.jpg);"><span class="view-price">'. $row[1] .'</span></div>';
                                echo '<div id="view-info"><h2>'. $_GET['prod'] .' - '. $_GET['id'] .'</h2>';
                                echo '<span id="dimension">'. $row[0] .'cm</span></div></div>';
                                break;
                        }
                    ?>

                    <div id="quantSelect">
                       <?PHP
                            if($_GET['prod'] == 'Box') {
                                
                                $count;
                                $qry = "SELECT COUNT(*) AS Total FROM PaperTbl;";
                                $result = mysqli_query($dbc, $qry);

                                while($row = mysqli_fetch_assoc($result))
                                    $count = $row['Total'];
                                
                                $qry = "SELECT PaperID FROM PaperTbl;";
                                $result = mysqli_query($dbc, $qry);
                                
                                echo '<div id="papers"><div>';
                                
                                while($row = mysqli_fetch_assoc($result))
                                    echo '<div class="paper" alt="'. $_GET['id'] .'" name="'. $row['PaperID'] .'" title="'. $row['PaperID'] .'" style="background-image: url(media/papers/'. $row['PaperID'] .'.jpg);"></div>';
                                
                                echo '</div></div>';
                                
                            } elseif ($_GET['prod'] == 'Bow') {
                                
                                $qry = "SELECT BowID, Width FROM BowTbl WHERE Width = ". $row[0] .";";
                                $result = mysqli_query($dbc, $qry);
                                
                                echo '<div id="papers"><div>';
                                
                                while($row = mysqli_fetch_assoc($result))
                                    echo '<div class="paper" alt="'. $row['Width'] .'" name="'. $row['BowID'] .'" title="'. $row['BowID'] .'" style="background-image: url(media/bows/'. $row['BowID'] .'.jpg);"></div>';
                                
                                echo '</div></div>';
                                
                            } elseif ($_GET['prod'] == 'Ribbon') {
                                
                                $qry = "SELECT RibbonID, Width FROM RibbonTbl WHERE Width = ". $row[0] .";";
                                $result = mysqli_query($dbc, $qry);
                                
                                echo '<div id="papers"><div>';
                                
                                while($row = mysqli_fetch_assoc($result))
                                    echo '<div class="paper" alt="'. $row['Width'] .'" name="'. $row['RibbonID'] .'" title="'. $row['RibbonID'] .'" style="background-image: url(media/ribbons/'. $row['Width'] .'/'. $row['RibbonID'] .'.jpg);"></div>';
                                
                                echo '</div></div>';
                                
                            } elseif ($_GET['prod'] == 'Butterfly') {
                                
                                $qry = "SELECT ButterflyID, Width FROM ButterflyTbl WHERE Width = ". $row[0] .";";
                                $result = mysqli_query($dbc, $qry);
                                
                                echo '<div id="papers"><div>';
                                
                                while($row = mysqli_fetch_assoc($result))
                                    echo '<div class="paper" alt="'. $row['Width'] .'" name="'. $row['ButterflyID'] .'" title="'. $row['ButterflyID'] .'" style="background-image: url(media/butterflies/'. $row['Width'] .'/'. $row['ButterflyID'] .'.jpg);"></div>';
                                
                                echo '</div></div>';
                                
                            }
                        ?>
                        
                        <div id="output">
                            <ul id="list">
                            </ul>
                            
                            <div id="ctrl">
                                <input type="number" value="1" name="quant" id="quant">
                                <input type="button" value="Add to Chart" id="add">
                                <input type="button" value="Order" id="order">
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        
        
        <?PHP include "assets/footer.html"; ?>
        
        <script type="text/javascript" src="script/script2.js"></script>
        <?PHP mysqli_close($dbc); ?>
    </body>
</html>