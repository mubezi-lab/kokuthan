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
                    <a href="/kokuthan/public/admin/users/<?= $user['id'] ?>/access"
                       class="btn-sm">
                        Manage Access
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
