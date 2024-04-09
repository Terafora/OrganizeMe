<?php
include "./classes/Note.php";

$objNote = new Note();

// Check if the delete button is clicked and if an ID is provided
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $note_id = $_GET['id'];
    if ($objNote->delete($note_id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to delete the note.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Home page of OrganizeMe" />
    <title>OrganizeMe</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <?php include "./includes/navbar.php" ?>

    <main role="main" >
        <?php
            $query = "SELECT * FROM notes";
            $stmt = $objNote->runQuery($query);
            $stmt->execute();    
        ?>

        <h2 class="todos-main-title">Todos</h2>
        <div class="create-button-container">
            <a href="./form.php"><button class="def-button create-button white-text">Create a new note</button></a>
        </div>
        <div class="todo-list">
            <?php if ($stmt -> rowCount() > 0) { ?>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <?php
                        $priority_class = '';
                        switch ($row['priority_lvl']) {
                            case 'high-priority':
                                $priority_class = 'high-priority';
                                break;
                            case 'medium-priority':
                                $priority_class = 'medium-priority';
                                break;
                            case 'low-priority':
                                $priority_class = 'low-priority';
                                break;
                            default:
                                $priority_class = '';
                                break;
                        }
                    ?>
                    <div class="<?php echo $priority_class; ?> todo-card">
                        <h3><?php print $row['title']; ?></h3>
                        <p><?php print $row['content']; ?></p>
                        <p><strong>Due Date: <?php print $row['due_date']; ?></strong></p>
                        <p><strong>Priority Level: <?php print $row['priority_lvl'];?></strong></p>
                        <a href="./form.php?edit_id=<?php print $row['id']; ?>"><button class="def-button edit-button">Edit</button></a>
                        <a href="./index.php?id=<?php print $row['id']; ?>"><button class="def-button delete-button">Delete</button></a>
                        <!--<p class="status" onclick="toggleStatus(<?php echo $row['id']; ?>)"><?php print $row['complete'] ? '<i class="fa-regular fa-circle-check" ></i>' : '<i class="fa-regular fa-circle"></i>'; ?></p> -->
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h3>Create a new note above.</h3>
            <?php } ?>
        </div>
    </main>
    <?php include "./includes/footer.php" ?>
    <script src="https://kit.fontawesome.com/b30a727321.js" crossorigin="anonymous"></script>
    <script src="./js/app.js"></script>
</body>
</html>
