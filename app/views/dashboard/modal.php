

<!-- Compact Modal Styles -->
<style>
.modal { display: none; position: fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.4); z-index:1000; }
.modal-content { background:#fff; margin:50px auto; padding:20px; border-radius:8px; width:95%; max-width:400px; max-height:90%; overflow-y:auto; }
.modal-header { display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #ccc; padding-bottom:10px; }
.close-btn { font-size:1.5rem; background:none; border:none; cursor:pointer; }
.form-group { margin-bottom:12px; display:flex; flex-direction:column; }
input, select { padding:8px; border-radius:4px; border:1px solid #ccc; font-size:0.95rem; }
.btn { background:#007bff; color:#fff; border:none; padding:8px 12px; border-radius:5px; cursor:pointer; font-size:0.95rem; }
.project-list { max-height:200px; overflow-y:auto; border:1px solid #ccc; padding:8px; border-radius:4px; }
.project-assignment { display:flex; justify-content:space-between; align-items:center; margin-bottom:8px; }
</style>

<!-- Modal JS -->
<script>
// Open modal
document.getElementById('openAddUserModal').addEventListener('click', function() {
    document.getElementById('addUserModal').style.display = 'block';
});

// Close modal
document.getElementById('closeAddUser').addEventListener('click', function() {
    document.getElementById('addUserModal').style.display = 'none';
});

// Close modal on outside click
window.addEventListener('click', function(e) {
    if (e.target.id === 'addUserModal') {
        document.getElementById('addUserModal').style.display = 'none';
    }
});
</script>
