<?php
require_once 'scripts/data_scripts/student_data.php';
$results = $studentObj->getResults($currentStudent['student_id']);

require_once 'components/header.php';
require_once 'components/navbar.php';
?>
<div class="wrapper">
    <?php require_once 'components/sidebar.php'; ?>
    <div class="main-content">
        <h2>Academic Performance Reports</h2>
        <div class="card">
            <h3>Published Examination Records</h3>
            <?php if(count($results) > 0): ?>
                <table>
                    <thead><tr><th>Code</th><th>Course Title</th><th>Raw Score</th><th>Grade</th><th>Semester Term</th></tr></thead>
                    <tbody>
                        <?php foreach($results as $r): ?>
                            <tr><td><?php echo htmlspecialchars($r['course_code']); ?></td><td><?php echo htmlspecialchars($r['course_name']); ?></td><td><?php echo htmlspecialchars($r['score']); ?></td><td><strong><?php echo htmlspecialchars($r['grade']); ?></strong></td><td><?php echo htmlspecialchars($r['semester']); ?></td></tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No official examination marks have been published to your registry profile.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once 'components/footer.php'; ?>