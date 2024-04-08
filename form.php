<?php

?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta name="description" content="Form for making a note with OrganizeMe" />
        <title>Note Form</title>
        <?php
            require_once './classes/note.php';
        ?>
        <link qrel="stylesheet" type="text/css" href="./css/styles.css">
    </head>
    <body>
        <main>
            <h2>Fields with an <span class="red">*</span> are required</h2>
            <form method="post">
                <label for="title">Note Title</label>
                <input type="text" name="title" id="title" value="" placeholder="Note Title" maxlength="100" required>
                <br>
                <label for="content">Content</label>
                <input type="text" name="content" id="content" value="" placeholder="Type the contents of your note here." maxlength="350" required>
                <br>
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" value="" placeholder="DD/MM/YYYY" required>
                <br>
                <label for="id">ID</label>
                <input type="number" name="id" id="id" readonly>
                <br>
                <input type="submit" value="Submit">
            </form>
        </main>
    </body>
    </html>