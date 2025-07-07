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
    <li>Unknown Devices: <?= $statusCounts['unknown'] ?></li>
</ul>


<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #000000;
    }
    th, td {
        padding: 12px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    .device-type {
        font-weight: 500;
        padding: 4px 8px;
        border-radius: 4px;
        background-color: #e9ecef;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Device Name</th>
            <th>IP Address</th>
            <th>Device Type</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($devices as $device): ?>
            <?php
                $color = '';
                if ($device->status === 'online') {
                    $color = '#a8d5b8'; // Green for online
                } elseif ($device->status === 'offline') {
                    $color = '#f5b5b8'; // Red for offline
                } else {
                    $color = '#d6d8db'; // Gray for unknown
                }
            ?>
            <tr style="background-color: <?= $color ?>;">
                <td><?= htmlspecialchars($device->name) ?></td>
                <td><?= htmlspecialchars($device->ip_address) ?></td>
                <td><span class="device-type"><?= htmlspecialchars($device->device_type) ?></span></td>
                <td><?= htmlspecialchars(ucfirst($device->status)) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

