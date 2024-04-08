<?php
include "./classes/Note.php";

$objNote = new Note();

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

        <h2>Notes</h2>
        <div>
            <?php if ($stmt -> rowCount() > 0) { ?>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <?php
                        $priority_class = '';
                        switch ($row['priority_lvl']) {
                            case 'high':
                                $priority_class = 'high-priority';
                                break;
                            case 'medium':
                                $priority_class = 'medium-priority';
                                break;
                            case 'low':
                                $priority_class = 'low-priority';
                                break;
                            default:
                                $priority_class = '';
                                break;
                        }
                    ?>
                    <div class="<?php echo $priority_class; ?>">
                        <h2><?php print $row['title']; ?></h2>
                        <p><?php print $row['content']; ?></p>
                        <p>Due Date: <?php print $row['due_date']; ?></p>
                        <p>Priority Level: <?php print $row['priority_lvl']; ?></p>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h3>Create a new note below</h3>
            <?php } ?>
            <button><a href="./form.php">Create a new note</a></button>
        </div>
    </main>
    <?php include "./includes/footer.php" ?>
</body>
</html>
