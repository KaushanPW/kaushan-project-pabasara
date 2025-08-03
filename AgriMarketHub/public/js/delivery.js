document.getElementById('deliveryForm').addEventListener('submit', function (e) {
  e.preventDefault(); // prevent actual form submission

  // Simple validation (could be expanded)
  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const address = document.getElementById('address').value.trim();
  const date = document.getElementById('date').value.trim();

  if (name && email && phone && address && date) {
    document.getElementById('form-message').textContent = '✅ Delivery info submitted!';
    document.getElementById('form-message').style.color = 'green';
    this.reset(); // Clear form
  } else {
    document.getElementById('form-message').textContent = '❌ Please fill out all fields.';
    document.getElementById('form-message').style.color = 'red';
  }
});



document.getElementById('deliveryForm').addEventListener('submit', function(e) {
    // Ensure CSRF token is fresh
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    fetch('/sanctum/csrf-cookie').then(() => {
        // Token refreshed if needed
    });
});