<?php

include "dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form Data Retrieval
    $schedule_id = $_POST['schedule_id'] ?? null;
    $department = $_POST['department'] ?? null;
    $subject = trim($_POST['subject_description'] ?? null);
    $teacher = trim($_POST['teacher'] ?? null);
    $days = $_POST['day'] ?? [];
    $room = trim($_POST['room'] ?? null);
    $start_time = $_POST['start_time'] ?? null;
    $end_time = $_POST['end_time'] ?? null;
    $course = trim($_POST['course'] ?? null);

    // Convert the time into a 12-hour format
    $start_time_12hr = date("h:i A", strtotime($start_time));
    $end_time_12hr = date("h:i A", strtotime($end_time));
    $time = $start_time_12hr . ' - ' . $end_time_12hr;

    // Determine the table name based on the department
    $tableName = match ($department) {
        'CET' => 'cetsched',
        'CASE' => 'casesched',
        'CHTM' => 'chtmsched',
        'CBMA' => 'cbmasched',
        'Law' => 'lawsched',
        'Marine' => 'marinesched',
        'Crim' => 'crimsched',
        default => null,
    };

    if (!$tableName) {
        echo "Invalid department selected.";
        exit;
    }
       //concatenate days into one string//
    $daysString = implode(', ', $days);

    // Debugging: Print input values
    echo "Schedule ID: $schedule_id<br>";
    echo "Subject: $subject<br>";
    echo "Teacher: $teacher<br>";
    echo "Days: $daysString<br>";
    echo "Room: $room<br>";
    echo "Time: $time<br>";
    echo "Course: $course<br>";

   // Check for conflicts (excluding the current schedule)

   $sql = "SELECT * FROM $tableName WHERE day = ? AND room = ? AND time = ? AND course = ? AND schedule_id != ?";

   $stmt = $conn->prepare($sql);

   $stmt->bind_param("ssssi", $daysString, $room, $time, $course, $schedule_id);

   $stmt->execute();

   $result = $stmt->get_result();


   if ($result->num_rows > 0) {

       echo "Conflict detected:<br>";

       while ($row = $result->fetch_assoc()) {

           echo "Subject: " . htmlspecialchars($row['Subject']) . "<br>";

           echo "Teacher: " . htmlspecialchars($row['Teacher']) . "<br>";

           echo "Days: " . htmlspecialchars($row['Day']) . "<br>";

           echo "Room: " . htmlspecialchars($row['Room']) . "<br>";

           echo "Time: " . htmlspecialchars($row['Time']) . "<br>";

           echo "Course: " . htmlspecialchars($row['Course']) . "<br><br>";

       }

   } else {

       // No conflict, update the schedule

       $update_sql = "UPDATE $tableName SET subject = ?, teacher = ?, day = ?, room = ?, time = ?, course = ? WHERE schedule_id = ?";

       $update_stmt = $conn->prepare($update_sql);

       $update_stmt->bind_param("ssssssi", $subject, $teacher, $daysString, $room, $time, $course, $schedule_id);


       if ($update_stmt->execute()) {

           echo '<script>alert("Schedule updated successfully."); window.location.href = "Schedule.php";</script>';

       } else {

           echo "<script>alert('Error: " . $update_stmt->error . "');</script>";

       }

   }


   $stmt->close();

   $conn->close();

}

?>