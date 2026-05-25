<?php
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Global testing student ID since we aren't using login walls right now
$test_student_id = 'STU001';