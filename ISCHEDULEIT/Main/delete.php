<?php

include "dbconnect.php";

$result = null; 
if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $department = $_POST['department']; 
    $tableName = '';
    switch ($department) {

        case 'CET':
            $tableName = 'cetsched'; 
            break;
        case 'CASE':
            $tableName = 'casesched'; 
            break;
        case 'CHTM':
            $tableName = 'chtmsched'; 
            break;
        case 'CBMA':
            $tableName = 'cbmasched'; 
            break;
        case 'Law':
            $tableName = 'lawsched'; 
            break;
        case 'Marine':
            $tableName = 'marinesched'; 
            break;
        case 'Crim':
            $tableName = 'crimsched'; 
            break;
        default:
            $tableName = '';
            break;

    }

    $deleteQuery = "DELETE FROM $tableName WHERE schedule_id = ?";
    if ($stmt = $conn->prepare($deleteQuery)) {
        $stmt->bind_param("i", $deleteId);
        if ($stmt->execute()) {
            echo '<script type="text/javascript">';
            echo 'alert("Schedule Deleted.");';
            echo 'window.location.href = "Schedule.php";';
            echo '</script>';
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

if (isset($_POST['department']) && !empty($_POST['department'])) {
    $department = $_POST['department'];
    $tableName = '';
    if ($tableName) {
        $query = "SELECT * FROM $tableName";
        $result = $conn->query($query);
        if (!$result) {
            echo "Error executing query: " . $conn->error; 
        }
    }
}

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Teacher']}</td>
                <td>{$row['Subject']}</td>
                <td>{$row['Day']}</td>
                <td>{$row['Time']}</td>
                <td>{$row['Room']}</td>
                <td>{$row['Course']}</td>
                <td>
                    <form method='POST' action='delete.php' style='display:inline;'>
                        <input type='hidden' name='delete_id' value='{$row['schedule_id']}'>
                        <input type='hidden' name='department' value='{$department}'> <!-- Ensure department is included -->
                        <button type='submit' class='delete-btn'>Delete</button>
                    </form>
                </td>
              </tr>";

    }

} else {
    echo "<tr><td colspan='7'>NO RECORDS FOUND</td></tr>";
}
$conn->close();

?>