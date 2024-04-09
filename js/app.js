// Function to handle status toggle
function toggleStatus(status) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update UI if status update successful
                var statusElement = document.getElementById("status_" + status);
                if (statusElement.innerHTML.trim() === '<i class="fa-regular fa-circle-check"></i>') {
                    statusElement.innerHTML = '<i class="fa-regular fa-circle"></i>';
                } else {
                    statusElement.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
                }
            } else {
                console.error("Failed to update status.");
            }
        }
    };
    xhr.send("id=" + status);
}
