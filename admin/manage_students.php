<?php
require_once __DIR__ . '/scripts/data_scripts/admin_data.php';

$feedback = '';

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $target_id = sanitizeInput($_GET['id']);
    if ($adminObj->deleteStudent($target_id)) {
        $feedback = "Student account profile row dropped successfully.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_student'])) {
    $id = sanitizeInput($_POST['student_id']);
    $pass = $_POST['password'];
    $name = sanitizeInput($_POST['full_name']);
    $email = sanitizeInput($_POST['email']);
    $level = sanitizeInput($_POST['level']);

    if ($adminObj->addStudent($id, $pass, $name, $email, $level)) {
        $feedback = "New student user records established.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modify_student'])) {
    $id = sanitizeInput($_POST['student_id']);
    $name = sanitizeInput($_POST['full_name']);
    $email = sanitizeInput($_POST['email']);
    $level = sanitizeInput($_POST['level']);
    $phone = sanitizeInput($_POST['phone']);
    $bio = sanitizeInput($_POST['bio']);

    if ($adminObj->updateStudent($id, $name, $email, $level, $phone, $bio)) {
        $feedback = "Student profile alterations saved successfully.";
    }
}

$students = $adminObj->getAllStudents();

require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/navbar.php';
?>
<div class="wrapper">
    <?php require_once __DIR__ . '/components/sidebar.php'; ?>
    <div class="main-content">
        <h2>Student Accounts Registry Management</h2>
        <?php if($feedback) echo "<div class='alert'>$feedback</div>"; ?>

        <div class="card">
            <h3>Onboard New Student User Account</h3>
            <form action="manage_students.php" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Student ID</label>
                        <input type="text" name="student_id" class="form-control" required placeholder="STU002">
                    </div>
                    <div class="form-group">
                        <label>Password Allocation</label>
                        <input type="password" name="password" class="form-control" required placeholder="••••••••">
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control" required placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required placeholder="johndoe@bells.edu">
                    </div>
                    <div class="form-group">
                        <label>Class Level</label>
                        <select name="level" class="form-control" required>
                            <option value="100">100 Level</option>
                            <option value="200">200 Level</option>
                            <option value="300">300 Level</option>
                            <option value="400">400 Level</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="create_student" class="btn btn-primary">Onboard Account</button>
            </form>
        </div>

        <div class="card">
            <h3>System Student Ledger Database Rows</h3>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Profile Particulars Information</th>
                        <th>Standing Level</th>
                        <th style="text-align: center;">Dangerous Row Controls</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $s): ?>
                        <tr>
                            <td valign="top"><code><?php echo htmlspecialchars($s['student_id']); ?></code></td>
                            <td>
                                <form action="manage_students.php" method="POST" style="margin: 0;">
                                    <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($s['student_id']); ?>">
                                    <div class="form-grid" style="margin-bottom: 5px;">
                                        <input type="text" name="full_name" class="form-control" style="padding: 5px;" value="<?php echo htmlspecialchars($s['full_name']); ?>">
                                        <input type="email" name="email" class="form-control" style="padding: 5px;" value="<?php echo htmlspecialchars($s['email']); ?>">
                                    </div>
                                    <div class="form-grid">
                                        <input type="text" name="phone" class="form-control" style="padding: 5px;" placeholder="Telephone" value="<?php echo htmlspecialchars($s['phone']); ?>">
                                        <textarea name="bio" class="form-control" style="padding: 5px; height: 32px;" placeholder="Short Bio"><?php echo htmlspecialchars($s['bio']); ?></textarea>
                                    </div>
                            </td>
                            <td valign="top">
                                    <select name="level" class="form-control" style="padding: 4px; width: auto;">
                                        <option value="100" <?php if($s['level'] == '100') echo 'selected'; ?>>100 Lvl</option>
                                        <option value="200" <?php if($s['level'] == '200') echo 'selected'; ?>>200 Lvl</option>
                                        <option value="300" <?php if($s['level'] == '300') echo 'selected'; ?>>300 Lvl</option>
                                        <option value="400" <?php if($s['level'] == '400') echo 'selected'; ?>>400 Lvl</option>
                                    </select>
                            </td>
                            <td align="center" valign="top">
                                    <button type="submit" name="modify_student" class="btn btn-secondary" style="padding: 4px 8px; font-size: 12px; margin-bottom: 4px;">Update</button>
                                </form>
                                <hr style="border:0; border-top:1px solid #e2e8f0; margin: 4px 0;">
                                <a href="manage_students.php?action=delete&id=<?php echo urlencode($s['student_id']); ?>" class="btn btn-danger" style="padding: 4px 8px; font-size: 12px;" onclick="return confirm('Are you completely sure you want to drop this student row from server tables?');">Delete Row</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/components/footer.php'; ?>