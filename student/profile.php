<?php
require_once 'scripts/data_scripts/student_data.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = sanitize($_POST['phone']);
    $bio = sanitize($_POST['bio']);
    
    if ($studentObj->updateBioInfo($currentStudent['student_id'], $phone, $bio)) {
        $msg = "Profile biographical settings successfully saved to your record!";
        $currentStudent = $studentObj->getProfile($test_student_id);
    }
}

require_once 'components/header.php';
require_once 'components/navbar.php';
?>
<div class="wrapper">
    <?php require_once 'components/sidebar.php'; ?>
    <div class="main-content">
        <h2>Profile Management</h2>
        <?php if($msg) echo "<div class='alert'>$msg</div>"; ?>
        
        <div class="card">
            <h3>Academic Information (Read-Only)</h3>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($currentStudent['full_name']); ?></p>
            <p><strong>Student Registration ID:</strong> <?php echo htmlspecialchars($currentStudent['student_id']); ?></p>
            <p><strong>Department Branch:</strong> <?php echo htmlspecialchars($currentStudent['department_name'] ?? 'Computer Science'); ?></p>
            <p><strong>Current Standing Level:</strong> <?php echo htmlspecialchars($currentStudent['level']); ?> Level</p>
        </div>

        <div class="card">
            <h3>Editable Biographical Records</h3>
            <form action="profile.php" method="POST">
                <div class="form-group">
                    <label>Official Institutional Email Address</label>
                    <input type="text" class="form-control" disabled value="<?php echo htmlspecialchars($currentStudent['email']); ?>">
                </div>
                <div class="form-group">
                    <label>Active Telephone Line</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($currentStudent['phone']); ?>">
                </div>
                <div class="form-group">
                    <label>Short Biography Summary</label>
                    <textarea name="bio" class="form-control" rows="4"><?php echo htmlspecialchars($currentStudent['bio']); ?></textarea>
                </div>
                <button type="submit" class="btn">Save Profile Changes</button>
            </form>
        </div>
    </div>
</div>
<?php require_once 'components/footer.php'; ?>