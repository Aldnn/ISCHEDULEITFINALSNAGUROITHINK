<?php


include "dbconnect.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Collect form data

    $subject_description = $_POST['subject_description'];

    $semester = $_POST['semester'];

    $days = isset($_POST['day']) ? implode(',', $_POST['day']) : ''; // Combine days into a string

    $room = $_POST['room'];

    $campus = $_POST['campus'];

    $time = $_POST['time'];

    $course = $_POST['course'];

    $department = $_POST['department'];


    // Define all relevant tables

    $tables = [

        'CET' => 'cetsched',

        'CASE' => 'casesched',

        'CHTM' => 'chtmsched',

        'CBMA' => 'cbmasched',

        'Law' => 'lawsched',

        'Marine' => 'marinesched',

        'Crim' => 'crimsched',

    ];


    // Check if the selected department is valid

    if (!array_key_exists($department, $tables)) {

        echo "Invalid department selected.";

        exit;

    }


    $conflicting_entries = array();


    // Loop through all tables to check for conflicts

    foreach ($tables as $dept => $tableName) {

        // Conflict detection query

        $conflict_sql = "SELECT * FROM $tableName WHERE day = ? AND room = ? AND time = ?";

        $conflict_stmt = $conn->prepare($conflict_sql);

        $conflict_stmt->bind_param("sss", $days, $room, $time);

        $conflict_stmt->execute();

        $result = $conflict_stmt->get_result();


        // If conflicts are found, collect them

        while ($row = $result->fetch_assoc()) {

            $conflict_course = isset($row['Course']) ? $row['Course'] : 'N/A';

            $conflict_room = isset($row['Room']) ? $row['Room'] : 'N/A';

            $conflict_time = isset($row['Time']) ? $row['Time'] : 'N/A';

            $conflict_day = isset($row['Day']) ? $row['Day'] : 'N/A';

            $conflicting_entries[] = "Department: $dept, Course: $conflict_course, Room: $conflict_room, Time: $conflict_time, Day: $conflict_day";

        }


        $conflict_stmt->close();

    }


    if (!empty($conflicting_entries)) {

        // If there are conflicting entries, show them in an alert

        echo "<script>alert('Conflict detected: Following entries already exist:\\n" . implode("\\n", $conflicting_entries) . "');</script>";

    } else {

        // Proceed with insertion if no conflict

        $insert_sql = "INSERT INTO $tables[$department] (subject, campus, semester, day, room, time, course) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $insert_stmt = $conn->prepare($insert_sql);

        $insert_stmt->bind_param("sssssss", $subject_description, $campus, $semester, $days, $room, $time, $course);


        if ($insert_stmt->execute()) {

            echo '<script>alert("Schedule added successfully."); window.location.href = "Schedule.php";</script>';

        } else {

            echo "<script>alert('Error: " . $insert_stmt->error . "');</script>";

        }

    }


    // Close the connection

    $conn->close();

}

?>