<?php
use yii\helpers\Html;

$this->title = 'Status Monitoring';
?>

<h1>Status Monitoring</h1>
<!--show total -->
<h3>Device Status Overview</h3>
<ul>
    <li>Online Devices: <?= $statusCounts['online'] ?></li>
    <li>Offline Devices: <?= $statusCounts['offline'] ?></li>
</ul>


<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    table, th, td {
        border: 1px solid #000000;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Device Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($devices as $device): ?>
            <?php
                $color = '';
                if ($device->status === 'online') {
                    $color = '#a8d5b8'; // سبز پررنگ‌تر
                } else {
                    // Treat any non-online status as offline
                    $color = '#f5b5b8'; // قرمز پررنگ‌تر
                }
            ?>
            <tr style="background-color: <?= $color ?>;">
                <td><?= htmlspecialchars($device->name) ?></td>
                <td><?= htmlspecialchars($device->status === 'online' ? 'online' : 'offline') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

