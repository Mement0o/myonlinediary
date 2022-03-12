<?php
/* Cards */

$newCardTitle = isset($_POST['title']) ? $_POST['title'] : '';
$newCardContent = isset($_POST['content']) ? $_POST['content'] : '';

/* Create directory */
$title = str_replace(' ', '', $newCardTitle);
$directoryCard = './cards/' . $title . "/";
mkdir($directoryCard, 0700);

/* Title */
$titleFile = $directoryCard . "title.txt"; 
file_put_contents($titleFile, $newCardTitle);

/* Content */
$contentFile = $directoryCard . "content.txt";
file_put_contents($contentFile, $newCardContent);

/* ------------ IMAGE UPLOAD ------------- */

$newCardCover = $directoryCard . $_FILES['cover']['name'];

$newfilename = date('dmYHis').str_replace(" ", "", basename($_FILES["cover"]["name"]));

move_uploaded_file($_FILES['cover']['tmp_name'], $directoryCard . $newfilename);

// move_uploaded_file($_FILES['cover']['tmp_name'], $directoryCard . $_FILES['cover']['name']);


echo "<div class=\"cardTitle\">$newCardTitle</div>";
echo "<div class=\"cardContent\">$newCardContent</div>";
echo "<img src=\"$newCardCover\">"
?>