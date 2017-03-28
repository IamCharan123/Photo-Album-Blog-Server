<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Blog Server</title>
        <?php
            $title = $_POST["selectedalbum"];
             $dir = "uploads/$title";
                $response = array();
                if($opendir = opendir($dir))
                {
                    while(($file = readdir($opendir))!== FALSE)
                    {
                        if($file!="." && $file!="..")
                        {
                            array_push($response, "uploads/$title/$file");
                        }
                    }
                } 
        ?>    
        <script type="text/javascript">
            var js_array = [<?php echo '"'.implode('","', $response).'"' ?>];
            var imgArray = js_array;
            var counter = 0;
            function sliderLeft() 
            {  
                document.getElementById('mainImage').src = imgArray[counter % imgArray.length]; 
                counter -= 1;
            }
            function sliderRight() 
            {  
                document.getElementById('mainImage').src = imgArray[counter % imgArray.length]; 
                counter += 1;
            }
        </script>
    </head>
    <body background="images/bg.jpg">
        <div align="center" class="boxed" >
              <h1>Blog Server</h1>
                 <button onclick="sliderLeft()" class="myButton" style="float: center;"> Previous </button>
                &nbsp
                    <img id="mainImage" src="images/album.jpg" height="260px" width="65%" />
                &nbsp
                     <button onclick="sliderRight()" class="myButton" style="float: center;"> Next </button>
                <h3><?php  echo $_POST["selectedalbum"];?></h3>
                <br>        

                <form action="album.php">
                    <input type="submit" class="myButton" value="View Albums" style="float: right;" />
                </form>
                <form action="index.html">
                    <input type="submit" class="myButton" value="Submit another Album" style="float: right;" />
                </form>
                <font color="white"> Contact:</font> <a href="https://saicharanregunta.github.io/"><font color="white"> Sai Charan Regunta</font></a>    
                <br>
        </div>
    </body>
</html>
