<?php
use yii\helpers\Html;

$this->title = 'View Devices';
?>

<h1>View Devices</h1>

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

    /* Modal style */
    #editModal {
        display: none;
        position: fixed;
        top: 20%;
        left: 35%;
        width: 30%;
        background: #fff;
        border: 2px solid #333;
        padding: 20px;
        z-index: 9999;
    }
    #modalOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 9998;
    }
</style>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Device Name</th>
            <th>IP Address</th>
            <th>Device Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($devices as $device): ?>
        <tr>
            <td><?= $device->id ?></td>
            <td><?= htmlspecialchars($device->name) ?></td>
            <td><?= htmlspecialchars($device->ip_address) ?></td>
            <td><?= htmlspecialchars($device->device_type) ?></td>
<td>
    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->username === 'admin'): ?>
        <!-- Edit Button -->
        <button class="edit-btn"
            data-id="<?= $device->id ?>"
            data-name="<?= htmlspecialchars($device->name) ?>"
            data-ip="<?= htmlspecialchars($device->ip_address) ?>"
            data-type="<?= htmlspecialchars($device->device_type) ?>">
            Edit
        </button>

        <!-- Delete Button -->
        <form method="post" action="index.php?r=site/delete-device" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this device?');">
            <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
            <?= Html::hiddenInput('id', $device->id) ?>
            <button type="submit" style="background-color: #ff6666; color: white; border: none; padding: 5px 10px;">Delete</button>
        </form>
    <?php else: ?>
        <span style="color: gray;">No Access</span>
    <?php endif; ?>
</td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<!-- Overlay -->
<div id="modalOverlay"></div>

<!-- Modal -->
<div id="editModal">
    <h2>Edit Device</h2>
    <form id="editForm" method="post" action="index.php?r=site/update-device">
        <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
        <div>
            <label for="editId">ID:</label>
            <input type="text" id="editId" name="id" readonly>
        </div>
        <div>
            <label for="editName">Device Name:</label>
            <input type="text" id="editName" name="name">
        </div>
        <div>
            <label for="editIp">IP Address:</label>
            <input type="text" id="editIp" name="ip_address">
        </div>
        <div>
            <label for="editType">Device Type:</label>
            <input type="text" id="editType" name="device_type">
        </div>
        <br>
        <button type="submit">Save</button>
        <button type="button" id="cancelEdit">Cancel</button>
    </form>
</div>

<script>
document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.getElementById('modalOverlay').style.display = 'block';
        document.getElementById('editModal').style.display = 'block';

        // پر کردن فیلدهای مودال
        document.getElementById('editId').value = this.dataset.id;
        document.getElementById('editName').value = this.dataset.name;
        document.getElementById('editIp').value = this.dataset.ip;
        document.getElementById('editType').value = this.dataset.type;
    });
});

// بستن مودال
document.getElementById('cancelEdit').addEventListener('click', function() {
    document.getElementById('modalOverlay').style.display = 'none';
    document.getElementById('editModal').style.display = 'none';
});
</script>
