<?php
require_once 'scripts/data_scripts/student_data.php';
$courses = $studentObj->getCourses($currentStudent['student_id']);

require_once 'components/header.php';
require_once 'components/navbar.php';
?>
<div class="wrapper">
    <?php require_once 'components/sidebar.php'; ?>
    <div class="main-content">
        <h2>Registered Courses</h2>
        <div class="card">
            <h3>Active Academic Modules</h3>
            <?php if(count($courses) > 0): ?>
                <table>
                    <thead><tr><th>Course Code</th><th>Course Title</th><th>Credit Weight</th></tr></thead>
                    <tbody>
                        <?php foreach($courses as $c): ?>
                            <tr><td><?php echo htmlspecialchars($c['course_code']); ?></td><td><?php echo htmlspecialchars($c['course_name']); ?></td><td><?php echo htmlspecialchars($c['credits']); ?> Units</td></tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No active semester entries located in your database tables.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once 'components/footer.php'; ?>