document.getElementById("contactForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const message = document.getElementById("message").value.trim();
    const msgElement = document.getElementById("form-message");

    if (!name || !email || !phone || !message) {
        alert("Please fill in all fields.");
        return;
    }

    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,}/i;
    if (!emailPattern.test(email)) 
        alert("Please enter a valid email address.");
        return;
    

    const phonePattern = /^[0-9]10/;
    if (!phonePattern.test(phone)) {
        alert("Please enter a 10-digit phone number.");
        return;
    }

    msgElement.style.display = "block";

this.reset();
});