<!-- ADD USER MODAL -->
<div class="modal" id="addUserModal">
    <div class="modal-content">

        <div class="modal-header">
            <h3>Ongeza Mtumiaji</h3>
            <button type="button" class="close-btn" id="closeAddUser">&times;</button>
        </div>

        <form method="POST" action="/kokuthan/public/admin/users/create">

            <input
                type="text"
                name="full_name"
                placeholder="Jina Kamili"
                required
            >

            <input
                type="text"
                name="username"
                placeholder="Username"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

            <select name="role" required>
                <option value="">Chagua Wadhifa</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="employee">Employee</option>
            </select>

            <button type="submit" class="btn">Hifadhi</button>

        </form>

    </div>
</div>
