<?php
require_once __DIR__ . '/scripts/data_scripts/admin_data.php';

$totalStudents = count($adminObj->getAllStudents());
$totalStaff = count($adminObj->getAllStaff());

require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/navbar.php';
?>
<div class="wrapper">
    <?php require_once __DIR__ . '/components/sidebar.php'; ?>
    <div class="main-content">
        <h2>System Administration Overview</h2>
        
        <div style="display: flex; gap: 20px; margin-bottom: 25px;">
            <div class="card" style="flex: 1; border-top: 4px solid #16a085; text-align: center;">
                <h4 style="margin:0; color:#7f8c8d; text-transform:uppercase; font-size:12px;">Active Registered Students</h4>
                <h1 style="margin: 10px 0 0 0; color:#2c3e50; font-size:36px;"><?php echo $totalStudents; ?></h1>
            </div>
            <div class="card" style="flex: 1; border-top: 4px solid #3498db; text-align: center;">
                <h4 style="margin:0; color:#7f8c8d; text-transform:uppercase; font-size:12px;">Onboarded Institutional Staff</h4>
                <h1 style="margin: 10px 0 0 0; color:#2c3e50; font-size:36px;"><?php echo $totalStaff; ?></h1>
            </div>
        </div>

        <div class="card">
            <h3>System Operations Notification</h3>
            <p>You are accessing the central control grid. From this section, you hold full root permissions allowing you to onboard profiles, patch existing biographical records, or drop rows completely from database servers.</p>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/components/footer.php'; ?>