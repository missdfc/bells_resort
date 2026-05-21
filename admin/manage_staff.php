<?php
require_once __DIR__ . '/scripts/data_scripts/admin_data.php';

$feedback = '';

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $target_id = sanitizeInput($_GET['id']);
    if ($adminObj->deleteStaff($target_id)) {
        $feedback = "Staff account profile row dropped successfully.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_staff'])) {
    $id = sanitizeInput($_POST['staff_id']);
    $pass = $_POST['password'];
    $name = sanitizeInput($_POST['full_name']);
    $email = sanitizeInput($_POST['email']);
    $role = sanitizeInput($_POST['role']);

    if ($adminObj->addStaff($id, $pass, $name, $email, $role)) {
        $feedback = "New staff account entry written successfully.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modify_staff'])) {
    $id = sanitizeInput($_POST['staff_id']);
    $name = sanitizeInput($_POST['full_name']);
    $email = sanitizeInput($_POST['email']);
    $role = sanitizeInput($_POST['role']);

    if ($adminObj->updateStaff($id, $name, $email, $role)) {
        $feedback = "Staff modification properties saved successfully.";
    }
}

$staffList = $adminObj->getAllStaff();

require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/navbar.php';
?>
<div class="wrapper">
    <?php require_once __DIR__ . '/components/sidebar.php'; ?>
    <div class="main-content">
        <h2>Staff Records Registry Management</h2>
        <?php if($feedback) echo "<div class='alert'>$feedback</div>"; ?>

        <div class="card">
            <h3>Onboard New Staff Member Account</h3>
            <form action="manage_staff.php" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Staff ID</label>
                        <input type="text" name="staff_id" class="form-control" required placeholder="STF001">
                    </div>
                    <div class="form-group">
                        <label>Initial Password Assignment</label>
                        <input type="password" name="password" class="form-control" required placeholder="••••••••">
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control" required placeholder="Dr. Sarah Johnson">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required placeholder="s.johnson@bells.edu">
                    </div>
                    <div class="form-group">
                        <label>Role Profile Level</label>
                        <select name="role" class="form-control" required>
                            <option value="Lecturer">Lecturer Track</option>
                            <option value="Admin">Admin Track</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="create_staff" class="btn btn-primary">Onboard Staff</button>
            </form>
        </div>

        <div class="card">
            <h3>System Staff Ledger Database Rows</h3>
            <table>
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Profile Account Particulars</th>
                        <th>Authorization Assignment Role</th>
                        <th style="text-align: center;">Dangerous Row Controls</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($staffList) > 0): foreach($staffList as $st): ?>
                        <tr>
                            <td valign="top"><code><?php echo htmlspecialchars($st['staff_id']); ?></code></td>
                            <td>
                                <form action="manage_staff.php" method="POST" style="margin: 0;">
                                    <input type="hidden" name="staff_id" value="<?php echo htmlspecialchars($st['staff_id']); ?>">
                                    <div class="form-grid">
                                        <input type="text" name="full_name" class="form-control" style="padding: 5px;" value="<?php echo htmlspecialchars($st['full_name']); ?>">
                                        <input type="email" name="email" class="form-control" style="padding: 5px;" value="<?php echo htmlspecialchars($st['email']); ?>">
                                    </div>
                            </td>
                            <td valign="top">
                                    <select name="role" class="form-control" style="padding: 4px; width: auto;">
                                        <option value="Lecturer" <?php if($st['role'] == 'Lecturer') echo 'selected'; ?>>Lecturer</option>
                                        <option value="Admin" <?php if($st['role'] == 'Admin') echo 'selected'; ?>>Admin</option>
                                    </select>
                            </td>
                            <td align="center" valign="top">
                                    <button type="submit" name="modify_staff" class="btn btn-secondary" style="padding: 4px 8px; font-size: 12px; margin-bottom: 4px;">Update</button>
                                </form>
                                <hr style="border:0; border-top:1px solid #e2e8f0; margin: 4px 0;">
                                <a href="manage_staff.php?action=delete&id=<?php echo urlencode($st['staff_id']); ?>" class="btn btn-danger" style="padding: 4px 8px; font-size: 12px;" onclick="return confirm('Are you completely sure you want to drop this staff record row from system servers?');">Delete Row</a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">No staff records located inside database engine tables. Register one above.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/components/footer.php'; ?>