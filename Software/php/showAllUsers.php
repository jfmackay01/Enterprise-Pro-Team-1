<?php
require '../db/dbconnect.php';
require '../php/showUser.php';

// Set up SQL Query to select the userID of users according to filter
// Default query if no filter
$query = "SELECT userID FROM USERS";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["userFilter"])) {
        $filter = $_GET["userFilter"];
        if ($filter != "all") {
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
