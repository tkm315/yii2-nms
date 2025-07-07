<?php
use yii\helpers\Html;

$this->title = 'Status Monitoring';
?>

<h1>Status Monitoring</h1>

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

    .online-row {
        background-color: #a8d5b8;
    }

    .offline-row {
        background-color: #f5b5b8;
    }

    .device-details {
        background-color: #f8f9fa;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #cccccc;
        display: none;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Device Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($devices as $device): ?>
            <?php $rowClass = $device->status === 'online' ? 'online-row' : 'offline-row'; ?>
            <tr class="<?= $rowClass ?>">
                <td><?= Html::encode($device->name) ?></td>
                <td><?= Html::encode($device->status) ?></td>
                <td>
                    <button onclick="toggleDetails('details-<?= $device->id ?>')">
                        Details
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div id="details-<?= $device->id ?>" class="device-details">
                        <strong>Device Details:</strong><br>
                        Name: <?= Html::encode($device->name) ?><br>
                        IP Address: <?= Html::encode($device->ip_address) ?><br>
                        Device Type: <?= Html::encode($device->device_type) ?><br>
                        Status: <?= Html::encode($device->status) ?><br>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    function toggleDetails(id) {
        var div = document.getElementById(id);
        if (div.style.display === "none" || div.style.display === "") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
</script>
