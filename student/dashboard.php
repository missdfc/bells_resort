<?php
// 1. Pull the data logic layer relative to where dashboard.php is located
require_once __DIR__ . '/scripts/data_scripts/student_data.php';

// 2. Pull the visual layout components relative to where dashboard.php is located
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/navbar.php';
?>
<div class="wrapper">
    <?php require_once 'components/sidebar.php'; ?>
    <div class="main-content">
        <h2>Dashboard Overview</h2>
        <div class="card">
            <h3>Welcome back, <?php echo htmlspecialchars($currentStudent['full_name']); ?>!</h3>
            <p>Your flat student profile setup is online. Use the sidebar layout links to inspect individual database modules natively without authentication gates blocking your design view.</p>
        </div>
    </div>
</div>
<?php require_once 'components/footer.php'; ?>