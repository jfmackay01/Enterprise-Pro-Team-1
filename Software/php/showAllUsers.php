<?php
require '../db/dbconnect.php';
require '../php/showUser.php';

// Set up SQL Query to select the userID of users according to filter
// Default query if no filter
$query = "SELECT userID FROM USERS";

if ($_SERVER["REQUEST_METHOD"] == "GET") { //if used method is get, perform selection
    if (isset($_GET["userFilter"])) {
        $filter = $_GET["userFilter"];

        if ($filter == "none"){
            $query = $query . " WHERE admin = 0 AND collab = 0 AND reviewer = 0";
        }
        else if ($filter != "all"){

            $query = $query . " WHERE " . $filter . " = 1";
        }
    }
}

// Perform query
$result = mysqli_query($conn, $query);
?>

<div class="row">
    <?php while ($row = $result->fetch_assoc()): ?>
    <?php $id = $row['userID']; ?>
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
            <div class="card-body">
                <?php showUser($id, $conn); ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php
$conn->close();
