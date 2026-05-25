<?php
function renderStatusBadge($status) {
    $cleanStatus = strtolower($status);
    return "<span class='badge badge-{$cleanStatus}'>" . htmlspecialchars($status) . "</span>";
}