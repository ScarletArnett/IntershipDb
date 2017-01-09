<?php  

    include "db.php";
    include "html_elements.php";
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: index.php');
    } else {
        htmlClassicHeader();
        htmlClassicContent();
        htmlClassicFooter();
        echo "
        <script type=\"text/javascript\">
            document.getElementById(\"nav-upload\").className = \"active\";
        </script>";
    }

    function htmlClassicContent() {
        $db = new DB();
        if (isset($_FILES['csv']['size']) ? ($_FILES['csv']['size']) : '' > 0) { 

        $file = $_FILES['csv']['tmp_name'];

        if (($handle = fopen($file, "r")) !== FALSE) {
            fgetcsv($handle);   
            $line = "";
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $line++;
                $num = count($data);
                for ($c=0; $c < $num; $c++) {
                    $col[$c] = $data[$c];
                }
                $db->import($col[0],$col[1],$col[2],$col[3],$col[4],$col[5],$col[6],$col[7],$col[8],$col[9]);
            }
            fclose($handle);
            $db->close();
            header('Location: home.php?success='.$line.'');
            die;
        }
    } 

    echo "
    <div class=\"login\">
        <div class=\"login-triangle\"></div>
      
        <h2 class=\"login-header\">Upload</h2>
        <form class=\"login-container\" action=\"\" method=\"post\"  enctype=\"multipart/form-data\">
            <p> <input name=\"csv\" type=\"file\" id=\"csv\" /> </p>
            <p><input type=\"submit\" name=\"Submit\" value=\"Submit\" /></p>
        </form>
        <p style=\"color:red; font-size:0.80em;\">Fichier CSV correspondant à la table 'intership_list' seulement.</p>
    </div>
     ";
    }

?> 

