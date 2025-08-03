 
    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const cardDetails = document.getElementById('cardDetails');
            if(this.value === 'cash_on_delivery') {
                cardDetails.style.display = 'none';
            } else {
                cardDetails.style.display = 'block';
            }
        });
    });