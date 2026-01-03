<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="app-container">

    <?php require_once __DIR__ . '/../layouts//admin/sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- HEADER -->
        <?php require_once __DIR__ . '/../layouts/topbar.php'; ?>

        <!-- CONTENT -->
        <section class="content">

            <!-- ACTION CARDS -->
            <div class="cards">
                <button class="card" id="openAddUser">➕ Ongeza User</button>
                <button class="card">📦 Ongeza Bidhaa</button>
                <button class="card">💸 Ongeza Matumizi</button>
                <button class="card">🛒 Manunuzi</button>
                <button class="card" id="openAddMiradi"><i class="fa-solid fa-briefcase"></i> Miradi</button>
                <a href="/kokuthan/public/admin/users" class="card">
                    <i class="fa fa-users"></i>
                    <span>Watumiaji</span>
                </a>



            </div>

            <hr>

            <!-- STATS -->
            <div class="stats">
                <div class="stat-card">
                    <h4>Mapato</h4>
                    <p>Tsh 2,500,000</p>
                </div>
                <div class="stat-card">
                    <h4>Matumizi</h4>
                    <p>Tsh 1,200,000</p>
                </div>
                <div class="stat-card">
                    <h4>Faida</h4>
                    <p>Tsh 1,300,000</p>
                </div>
            </div>

        </section>


        <!-- ADD USER MODAL -->
        <?php require_once __DIR__ . '/../layouts/admin/addUserForm.php'; ?>
        <?php require_once __DIR__ . '/../layouts/admin/addMiradiForm.php'; ?>

        <!-- FOOTER -->
        <?php require_once __DIR__ . '/../layouts/footer.php'; ?>
    </main>
</div>













