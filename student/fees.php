<?php
// 1. Pull the data logic layer relative to where this file sits
require_once __DIR__ . '/scripts/data_scripts/student_data.php';

// 2. Fetch the fees using the initialized student object
$fees = $studentObj->getFees($currentStudent['student_id']);

// 3. Render layout headers
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/navbar.php';
?>
<div class="wrapper">
    <?php require_once __DIR__ . '/components/sidebar.php'; ?>
    
    <div class="main-content">
        <h2>Financial Account Statements</h2>
        <div class="card">
            <h3>Institutional Ledger Invoice Items</h3>
            <?php if(count($fees) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Fee Description Statement</th>
                            <th>Amount Billable</th>
                            <th>Status</th>
                            <th>Payment Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($fees as $f): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($f['description']); ?></td>
                                <td>₦<?php echo number_format($f['amount'], 2); ?></td>
                                <td>
                                    <span class="badge badge-<?php echo strtolower($f['status']); ?>">
                                        <?php echo htmlspecialchars($f['status']); ?>
                                    </span>
                                </td>
                                <td><?php echo htmlspecialchars($f['due_date']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No active financial ledger accounts are listed under this account profile tracking criteria.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/components/footer.php'; ?>