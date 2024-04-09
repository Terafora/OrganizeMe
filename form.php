<?php

    // for showing errors
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

    // Add $complete variable
    $complete = isset($_POST['complete']) ? $_POST['complete'] : 0; // Assuming default is 0

    try {
        if($id != null){
            if($objNote->update($title, $content, $due_date, $priority_lvl, $id, $complete)){
                // Update completion status
                if ($complete == 1) {
                    $objNote->status($id);
                }
                $objNote->redirect('index.php?updated');
                exit();
            }
        } else {
            if($objNote->insert($title, $content, $due_date, $priority_lvl, $id, $complete)){
                header('Location: index.php?updated');
                exit();
            } else{
                $objNote->redirect('index.php?error');
                exit();
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Form for making a note with OrganizeMe" />
        <link rel="stylesheet" type="text/css" href="./css/styles.css">
        <?php
            require_once './classes/note.php';
        ?>
    </head>
    <body>
        <?php include "./includes/navbar.php" ?> 
        <main>
            <!-- form section -->
            <div class="form-page">
                <h2>Form</h2>
                <h3>Fields with an <span class="red-ast">*</span> are required</h3>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
                    <div >
                        <label for="title"><span class="red-ast">*</span> Note Title: </label>
                        <br>
                        <input type="text" name="title" id="title" value="<?php echo isset($row['title']) ? $row['title'] : ''; ?>" placeholder="Note Title" maxlength="100" required>
                    </div>
                    <br>
                    <div>
                        <label for="content"><span class="red-ast">*</span> Content: </label>
                        <br>
                        <textarea name="content" id="content" placeholder="Type the contents of your note here." maxlength="350" required><?php echo isset($row['content']) ? $row['content'] : ''; ?></textarea>
                    </div>
                    <br>
                    <div>
                        <label for="due_date"><span class="red-ast">*</span> Due Date: </label>
                        <br>
                        <input type="date" name="due_date" id="due_date" value="<?php echo isset($row['due_date']) ? $row['due_date'] : ''; ?>" placeholder="DD/MM/YYYY" required>
                    </div>
                    <br>
                    <div>
                        <label for="priority_lvl"><span class="red-ast">*</span> Priority Level: </label>
                        <br>
                        <select name="priority_lvl" id="priority_lvl" required>
                            <option value="high-priority" <?php echo (isset($row['priority_lvl']) && $row['priority_lvl'] == 'high-priority') ? 'selected' : ''; ?>>High</option>
                            <option value="medium-priority" <?php echo (isset($row['priority_lvl']) && $row['priority_lvl'] == 'medium-priority') ? 'selected' : ''; ?>>Medium</option>
                            <option value="low-priority" <?php echo (isset($row['priority_lvl']) && $row['priority_lvl'] == 'low-priority') ? 'selected' : ''; ?>>Low</option>
                        </select>
                    </div>
                    <br>
                    <input type="submit" name="btn_save" value="Submit" class="def-button create-button white-text">
                </form>
            </div>
        </main>
        <?php include "./includes/footer.php" ?>
        <script src="https://kit.fontawesome.com/b30a727321.js" crossorigin="anonymous"></script>
    </body>
    </html>
