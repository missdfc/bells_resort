<?php
// Fix: Step back 3 times to hit the root bells_resort folder, then go straight into configs
require_once __DIR__ . '/../../../configs/db.php';

require_once __DIR__ . '/../class_scripts/db-connection.class.php';

$adminObj = new Admin($pdo);

function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}