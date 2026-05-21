<?php
// Step up two levels out of scripts/data_scripts/ to get to configs/
require_once __DIR__ . '/../../../configs/db.php';

// Step up one level to reach utility.php and class_scripts/
require_once __DIR__ . '/../utility.php';
require_once __DIR__ . '/../class_scripts/db-connection.class.php';

$studentObj = new Student($pdo);
$currentStudent = $studentObj->getProfile($test_student_id);

if (!$currentStudent) {
    die("Error: Test student profile record could not be fetched from the database.");
}