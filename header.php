<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<!--Bootstrap Icon CDN-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="./css/style.css">
    <title>
        <?php 
        $filename= basename($_SERVER['PHP_SELF'],".php");
        $page_title= ucfirst(str_replace("_"," ",$filename));
        if($page_title==="Index"){
            echo "Dashboard";
        }
        else{
            echo $page_title;
        }
        ?>
    </title>
</head>
<body>
    <?php
    if(isset($_SESSION['is_login'])){
        include("./includes/gen_navbar.php");
    }
    
    ?>