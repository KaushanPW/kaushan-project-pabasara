document.addEventListener('DOMContentLoaded', function() {
    // Toggle between profile view and edit
    const editBtn = document.getElementById('editProfileBtn');
    const cancelBtn = document.getElementById('cancelEditBtn');
    const profileView = document.getElementById('profileView');
    const profileEdit = document.getElementById('profileEdit');

    if (editBtn && cancelBtn && profileView && profileEdit) {
        editBtn.addEventListener('click', function() {
            profileView.style.display = 'none';
            profileEdit.style.display = 'block';
        });

        cancelBtn.addEventListener('click', function() {
            profileView.style.display = 'block';
            profileEdit.style.display = 'none';
        });
    }

    // Add confirmation for delete action
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                e.preventDefault();
            }
        });
    });
});



document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('deleteAccountForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (confirm('This will permanently delete your account and all data. Continue?')) {
                // Add loading state
                const btn = form.querySelector('button[type="submit"]');
                btn.disabled = true;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
                
                form.submit();
            }
        });
    }
});


