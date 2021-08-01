<?php
include_once('Database.php');
$db=new Database('localhost','root','','trelloclone');
$lists=$db->getLists();
var_dump($lists);
?>

<!DOCTYPE html>
<html>
<head>
<title>Trello</title>
<script src="./node_modules/jquery/dist/jquery.js"></script>
<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

<link rel="stylesheet" href="style.css"> 
</head>
<body>
     
    <div id="main-container">
        <?php
            foreach($lists as $list)
            
            echo '
            <div class="list">
                <div id="list-header">
                    <div id="list-header-title">
                        '.$list["title"].'
                    </div>
                    <div id="list-header-option">
                        <span class="iconify" data-icon="mono-icons:options-horizontal" data-inline="false"></span>
                    </div>
                    
                </div>.'?>
                <div class="card">
                    <div id="card-image">

                    </div>
                    <div id="card-content">
                        <div id="card-content-title">
                            Transaction
                        </div>
                    </div>
                </div>
            </div>
        ';

    </div>


</body>
</html>

<script>
    
</script>