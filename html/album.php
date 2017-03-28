<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Blog Server</title>    
    </head>
    <body background="images/bg.jpg">
        <div align="center" class="boxed" >
                <h1>Blog Server</h1>
                <div id="album_list"  >
                
                    <form action="album_view.php" method="post" enctype="multipart/form-data">
                    
                        <select id="albumSelect" name="selectedalbum"  class="myButton"  > 
                                <?php  $row = exec('ls uploads/',$output,$error);
                                    while(list(,$row) = each($output))
                                    {
                                        echo "<option>$row</option>";
                                    }
                                    if($error)
                                    {
                                        echo "Error : $error<BR>\n";
                                        exit;
                                    } 
                                ?>
                        </select>
                                &nbsp&nbsp

                        <input type="submit" name="albumselect" class="myButton" value="Show Album"/>
                    </form>
                </div>
                 <br>
                <font color="white"> Contact:</font> <a href="https://saicharanregunta.github.io/"><font color="white"> Sai Charan Regunta</font></a>    
               
        </div>
    </body>
</html>
