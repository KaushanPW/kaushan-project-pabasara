   function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling;
            
            if (field.type === "password") {
                field.type = "text";
                icon.classList.replace('bxs-show', 'bxs-hide');
            } else {
                field.type = "password";
                icon.classList.replace('bxs-hide', 'bxs-show');
            }
        }
    