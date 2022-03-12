<?php

$directory = './entries';
$scanned = array_diff(scandir($directory), array('..', '.'));

$filename = './entries/' . date("Y-m-d H:i:s"); 
$current = file_get_contents($filename);

$isSet = isset($_GET['test']);
if ($isSet == true) {
    $current = $_GET['test'];
    if (strlen($current) > 0) {
        file_put_contents($filename, $current);
    }
}

?>


<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <div id="tab">Notes</div>
    </header>

    <main>
    <div id="entries">
    <?php 
         foreach ($scanned as $value) {
           $filepath = "./entries/" . $value;
           $content = file_get_contents($filepath); 
           echo "$content <br>";
         }
       ?>
    </div>    
    <form>
        <input autofocus name="test" type="text">
    </form>
    </main>

    <footer>
        <img src="assets/finder.png" id="home" class="toolbar">
        <img src="assets/preview.png" id="search" class="toolbar">
        <img src="assets/finder.png" id="search" class="toolbar">
    </footer>

</body>
</html>

