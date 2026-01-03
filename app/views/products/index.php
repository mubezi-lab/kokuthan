<?php require __DIR__ . '/../layouts/header.php'; ?>

<h2>Bidhaa Zote</h2>

<a href="/admin/products/create">➕ Ongeza Bidhaa</a>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>#</th>
        <th>Bidhaa</th>
        <th>Mradi</th>
        <th>Bei ya Kununua</th>
        <th>Bei ya Kuuza</th>
        <th>Unit</th>
    </tr>

    <?php foreach ($products as $i => $p): ?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= htmlspecialchars($p['name']) ?></td>
        <td><?= $p['project_name'] ?></td>
        <td><?= number_format($p['buying_price']) ?></td>
        <td><?= number_format($p['selling_price']) ?></td>
        <td><?= $p['unit'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
