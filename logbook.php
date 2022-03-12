<?php
$directory = './entries';
$scanned = array_diff(scandir($directory), array('..', '.'));
?>

<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="logbook.css">
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
                echo "<div class=\"date\">$value: </div>";
                echo "<div class=\"text\" title=\"$value\" >$content</div>";
            }
            ?>
        </div>

        <form>
            <input type="" name="entry" id="entry">
            <input type="submit" name="" value="submit" onclick="return clickButton();">
        </form>
    </main>

    <footer>
        <img src="assets/finder.png" id="home" class="toolbar">
        <img src="assets/preview.png" id="search" class="toolbar">
        <img src="assets/finder.png" id="search" class="toolbar">
    </footer>

</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $("html, body").animate({
        scrollTop: $(document).height()
    }, 50);


    function clickButton() {
        var entry = document.getElementById('entry').value;
        $.ajax({
            type: "post",
            url: "server_action.php",
            data: {
                'entry': entry,
            },
            cache: false,
            success: function(html) {
                var newEntry = $("<div>");
                newEntry.append(html);
                $('#entries').append(newEntry);
                $('#entry').val('');
                $("html, body").animate({
                    scrollTop: $(document).height()
                }, 1000);
            }
        });
        return false;
    }
</script>