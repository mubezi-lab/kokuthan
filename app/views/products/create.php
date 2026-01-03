<?php require __DIR__ . '/../layouts/header.php'; ?>

<h2>Ongeza Bidhaa Mpya</h2>

<form method="POST" action="/admin/products/store">
    <label>Mradi</label><br>
    <select name="project_id" required>
        <option value="">-- Chagua --</option>
        <?php foreach ($projects as $project): ?>
            <option value="<?= $project['id'] ?>">
                <?= $project['name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Jina la Bidhaa</label><br>
    <input type="text" name="name" required><br><br>

    <label>Bei ya Kununua</label><br>
    <input type="number" step="0.01" name="buying_price" required><br><br>

    <label>Bei ya Kuuza</label><br>
    <input type="number" step="0.01" name="selling_price" required><br><br>

    <label>Unit (mf. pcs, crate)</label><br>
    <input type="text" name="unit"><br><br>

    <button type="submit">Hifadhi</button>
</form>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
