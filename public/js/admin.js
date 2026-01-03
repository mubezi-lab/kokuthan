
document.addEventListener('DOMContentLoaded', () => {

    // ===== Sidebar Toggle =====
    const toggleSidebarBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    if (toggleSidebarBtn && sidebar) {
        toggleSidebarBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    }

    // ===== Add Miradi Modal =====
    const openAddMiradiBtn = document.getElementById('openAddMiradi');
    const addMiradiModal = document.getElementById('addMiradiModal');
    const closeAddMiradiBtn = document.getElementById('closeAddMiradi');

    if (openAddMiradiBtn && addMiradiModal) {
        openAddMiradiBtn.addEventListener('click', () => {
            addMiradiModal.classList.add('active');
        });
    }
    if (closeAddMiradiBtn && addMiradiModal) {
        closeAddMiradiBtn.addEventListener('click', () => {
            addMiradiModal.classList.remove('active');
        });
    }

    // ===== Add User Modal =====
    const openAddUserBtn = document.getElementById('openAddUser');
    const addUserModal = document.getElementById('addUserModal');
    const closeAddUserBtn = document.getElementById('closeAddUser');

    if (openAddUserBtn && addUserModal) {
        openAddUserBtn.addEventListener('click', () => {
            addUserModal.classList.add('active');
        });
    }

    if (closeAddUserBtn && addUserModal) {
        closeAddUserBtn.addEventListener('click', () => {
            addUserModal.classList.remove('active');
        });
    }

    if (addUserModal) {
        addUserModal.addEventListener('click', (e) => {
            if (e.target === addUserModal) addUserModal.classList.remove('active');
        });
    }

    // ===== Manage Access Modal =====
    const accessModal = document.getElementById('accessModal');
    const closeAccessModal = accessModal?.querySelector('.close');
    const accessForm = document.getElementById('accessForm');
    const currentAccessList = document.getElementById('currentAccessList');
    const modalUserName = document.getElementById('modalUserName');
    const modalUserId = document.getElementById('modalUserId');

    if (accessModal && closeAccessModal && accessForm && currentAccessList) {

        // Fungua modal ya access
        document.querySelectorAll('.manage-access-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const userId = this.dataset.userId;
                const userName = this.closest('tr').querySelector('td').innerText;

                accessModal.style.display = 'block';
                modalUserName.innerText = userName;
                modalUserId.value = userId;

                loadAccess(userId);
            });
        });

        // Funga modal kwa X
        closeAccessModal.addEventListener('click', () => {
            accessModal.style.display = 'none';
        });

        // Funga modal kwa click nje ya content
        window.addEventListener('click', e => {
            if (e.target === accessModal) accessModal.style.display = 'none';
        });

        // Load current access via AJAX
        function loadAccess(userId) {
            fetch('/kokuthan/public/admin/users/get-access?user_id=' + userId)
                .then(res => res.json())
                .then(data => {
                    currentAccessList.innerHTML = '';
                    if (data.length === 0) currentAccessList.innerHTML = '<li>No access assigned</li>';
                    data.forEach(item => {
                        const li = document.createElement('li');
                        li.textContent = item.project_name + ' (' + item.role + ')';
                        currentAccessList.appendChild(li);
                    });
                });
        }

        // Save access via AJAX
        accessForm.addEventListener('submit', e => {
            e.preventDefault();
            const formData = new FormData(accessForm);
            fetch('/kokuthan/public/admin/users/save-access', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if(data.success){
                    alert('Access saved!');
                    loadAccess(modalUserId.value);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(err => {
                alert('AJAX error: ' + err);
            });
        });
    }

});

