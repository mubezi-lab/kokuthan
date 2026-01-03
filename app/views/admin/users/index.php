<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Watumiaji</h2>

<table class="table">
    <thead>
        <tr>
            <th>Jina</th>
            <th>Username</th>
            <th>Global Role</th>
            <th>Vitendo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['full_name']) ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= ucfirst($user['role']) ?></td>
                <td>
                    <!-- Button kufungua modal -->
                    <button class="btn-sm manage-access-btn" data-user-id="<?= $user['id'] ?>">
                        Manage Access
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal ya Manage Access -->
<div id="accessModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Manage Access - <span id="modalUserName"></span></h3>

        <form id="accessForm">
            <input type="hidden" name="user_id" id="modalUserId">

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id">
                    <option value="#">Chagua Mradi</option>
                    <?php foreach ($projects as $project): ?>
                        <option value="<?= $project['id'] ?>"><?= htmlspecialchars($project['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role">
                    <option value="employee">Employee</option>
                    <option value="manager">Manager</option>
                </select>
            </div>

            <button type="submit" class="btn">Save</button>
        </form>

        <h4>Current Access</h4>
        <ul id="currentAccessList"></ul>
    </div>
</div>


<style>
/* Simple modal style */
.modal {
    position: fixed;
    top:0; left:0;
    width:100%; height:100%;
    background: rgba(0,0,0,0.5);
    display:flex;
    justify-content:center;
    align-items:center;
}

.modal-content {
    background: #fff;
    padding: 20px;
    border-radius:5px;
    width:400px;
    max-width:90%;
}

.modal .close {
    float:right;
    cursor:pointer;
    font-size:20px;
}
</style>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
<script src="/kokuthan/public/js/admin.js"></script>