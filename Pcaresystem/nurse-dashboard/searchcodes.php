<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" isset($_POST['searchFor'])) {
    $search_query = $_POST["search"];

    // Step 3: Write SQL queries to retrieve records from each table
    $sql_table1 = "SELECT * FROM table1 WHERE column_name LIKE '%$search_query%'";
    $sql_table2 = "SELECT * FROM table2 WHERE column_name LIKE '%$search_query%'";
    $sql_table3 = "SELECT * FROM table3 WHERE column_name LIKE '%$search_query%'";
    $sql_table4 = "SELECT * FROM table4 WHERE column_name LIKE '%$search_query%'";
    $sql_table5 = "SELECT * FROM table5 WHERE column_name LIKE '%$search_query%'";

    // Step 4: Execute the queries
    $result_table1 = $conn->query($sql_table1);
    $result_table2 = $conn->query($sql_table2);
    $result_table3 = $conn->query($sql_table3);
    $result_table4 = $conn->query($sql_table4);
    $result_table5 = $conn->query($sql_table5);

    // Step 5: Store the results in variables
    $table1_data = [];
    if ($result_table1->num_rows > 0) {
        while ($row = $result_table1->fetch_assoc()) {
            $table1_data[] = $row;
        }
    }

    $table2_data = [];
    if ($result_table2->num_rows > 0) {
        while ($row = $result_table2->fetch_assoc()) {
            $table2_data[] = $row;
        }
    }

    // Repeat the process for other tables

    // Step 6: Close the database connection
    $conn->close();
}
?>
