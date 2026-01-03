document.getElementById('toggleSidebar')
    .addEventListener('click', function () {
        document.getElementById('sidebar')
            .classList.toggle('active');
    });




// kufunga na kufunuga modal
const openBtn = document.getElementById('openAddUser');
const modal = document.getElementById('addUserModal');
const closeBtn = document.getElementById('closeAddUser');


openBtn.addEventListener('click', () => {
    modal.classList.add('active');
});

closeBtn.addEventListener('click', () => {
    modal.classList.remove('active');
});

// Close modal when clicking outside
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.remove('active');
    }
});
