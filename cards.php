<?php
$directory = './cards';
$scanned = array_diff(scandir($directory), array('..', '.'));
?>

<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cards.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <span id="back">Back</span>
        <span id="tab">Cards</span>
        <span id="new">New</span>
        <span id="edit">Edit</span>
    </header>

    <main>
        <div id="cards">
            <?php
           foreach ($scanned as $value) {
                $titlePath = "./cards/" . $value . ".title.txt";
                $title = file_get_contents($contentPath);

                $imagePath = "./cards/" . $value . ".png";
                $image = file_get_contents($contentPath);

                $contentPath = "./cards/" . $value . ".txt";
                $content = file_get_contents($contentPath);      

                echo "<div class=\"date\">$value: </div>";
                }
            
            ?>
        </div>
            
                    <form id="newCard" method="post" enctype="multipart/form-data">
                        <label for="title">Title</label>
                        <input name="title" type="text" id="title">
                        <label for="cover">Cover</label>
                        <input name="cover" type="file" id="cover">
                        <textarea type="text" name="content" id="content" form="newCard"></textarea>
                        <input type="submit" id="submit" name="" value="submit" onclick="return clickButton();">
                    </form>
            
                </main>
            
            </body>
            
            </html>
            
            
            <script type="text/javascript">
                $("html, body").animate({
                    scrollTop: $(document).height()
                }, 50);
            
                $("form").submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
            
                    $.ajax({
                        url: "server_cards.php",
                        type: 'POST',
                        data: formData,
                        success: function(html) {
                            var newCard = $("<div>");
                            newCard.addClass("card");
                            newCard.append(html);
                            $('#cards').append(newCard);
                            $('input').val('');
                            $('textarea').val('');
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                });
            
            </script>