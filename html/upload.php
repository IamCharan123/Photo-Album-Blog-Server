<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Blog Server</title>    
        <?php
            $finalResponse="";
            $reason="";
            $title = $_POST["title"];
            $text = $_POST["text"];
            extract($_POST);
            chmod("uploads", 0777);

            mkdir("uploads/$title");
            chmod("uploads/$title", 0777);

            $error=array();
            $extension=array("jpeg","jpg","png","gif");
            foreach($_FILES["filesUpload"]["tmp_name"] as $key=>$tmp_name)
                    {
                        $file_name=$_FILES["filesUpload"]["name"][$key];
                        $file_tmp=$_FILES["filesUpload"]["tmp_name"][$key];
                        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                        if(in_array($ext,$extension))
                        {
                           if(!file_exists("uploads/$title/".$txtGalleryName."/".$file_name))
                            {

                                move_uploaded_file($file_tmp=$_FILES["filesUpload"]["tmp_name"][$key],"uploads/$title/".$txtGalleryName."/".$file_name);
                                chmod("uploads/$title/".$txtGalleryName."/".$file_name, 0777);
                            }
                            else
                            {
                                $filename=basename($file_name,$ext);
                                $newFileName=$filename.time().".".$ext;
                                move_uploaded_file($file_tmp=$_FILES["filesUpload"]["tmp_name"][$key],"uploads/$title/".$txtGalleryName."/".$newFileName);
                                chmod("uploads/$title/".$txtGalleryName."/".$newFileName, 0777);
                            }
                        }
                        else
                        {
                            array_push($error,"$file_name, ");
                        }
                    }
        ?>

        <script type="text/javascript">
            
            <?php
                $title = $_POST["title"];
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
            function albumOpen(FolderName) {

                // body...
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
                <h3><?php  echo $_POST["title"];?></h3>
                <div class="box" align="center">
                       <?php echo $_POST["text"];?>
                </div>
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
