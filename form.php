<?php

    // for showing erros
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once './classes/note.php';
    $objNote = new Note();

    //GET code

    if(isset($_GET['edit_id'])){
        $id = $_GET['edit_id'];
        $stmt = $objNote->runQuery("SELECT * FROM notes WHERE id=:id");
        $stmt->execute(array(":id"=>$id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $id = null;
        $row = null;
    }


//POST code
    if (isset($_POST['btn_save'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $due_date = $_POST['due_date'];
        $priority_lvl = $_POST['priority_lvl'];
        $id = $_POST['id'];

        try {
            if($id != null){
                if($objNote->update($title, $content, $due_date, $priority_lvl, $id)){
                    $objNote->redirect('index.php?updated');
                }
            } else {
                if($objNote->insert($title, $content, $due_date, $priority_lvl, $id)){
                    $objNote->redirect('index.php?inserted');
                } else{
                    $objNote->redirect('index.php?error');
                }
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

?>


<!DOCTYPE html>
    <html>
    <head>
        <title>Note Form</title>
        <?php
            require_once './classes/note.php';
        ?>
    </head>
    <body>
        <main>

            // navbar will go here.
 

            // form section
            <h2>Fields with an <span class="red">*</span> are required</h2>
            <form method="POST">
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

        // Footer will go here
    </body>
    </html>