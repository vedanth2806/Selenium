<?php
// Check if table_name is provided in the query string
if (isset($_GET['table_name'])) {
    $table_name = $_GET['table_name'];

    // Perform deletion of all rows from the table (example using PDO)
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=myhmsdb', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement to delete all rows from the table
        $stmt = $pdo->prepare('DELETE FROM ' . $table_name);

        // Execute the statement
        $stmt->execute();

        echo 'All rows deleted successfully from table ' . $table_name;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Table name not provided';
}
?>
