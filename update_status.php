/*
Not able to get this working in a reasonable amount of time for submission,
however this isn't critical to the functionality of the app.
I'll return to this in my free time to figure it out.
*/

<?php
require_once './classes/Note.php';

// Check if ID is provided
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $note_id = $_POST['id'];
    $objNote = new Note();

    // Toggle status in the database
    $status = $objNote->status($note_id);
    if ($status) {
        // Status updated successfully
        http_response_code(200);
    } else {
        // Error updating status
        http_response_code(500);
    }
} else {
    // ID not provided
    http_response_code(400);
}
