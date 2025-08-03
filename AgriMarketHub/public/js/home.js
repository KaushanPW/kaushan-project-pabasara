
       document.addEventListener('DOMContentLoaded', function() {
    const typewriterElement = document.getElementById('typewriter');
    const text = "WELCOME TO AGRIMARKETHUB";
    let i = 0;
    
    function typeWriter() {
        if (i < text.length) {
            typewriterElement.innerHTML = text.substring(0, i+1);
            i++;
            setTimeout(typeWriter, 150);
        } else {
            
            setTimeout(() => {
                i = 0;
                typewriterElement.innerHTML = '';
                typeWriter();
            }, 3000); 
        }
    }
    
    typeWriter();
            
            
            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
                
                
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            });
            




           
            const searchInput = document.getElementById('searchInput');
            const searchButton = document.querySelector('.search-button');
            
            searchButton.addEventListener('click', function() {
                const searchTerm = searchInput.value.toLowerCase();
                const products = document.querySelectorAll('.product-card');
                
                products.forEach(product => {
                    const productName = product.querySelector('h3').textContent.toLowerCase();
                    if (productName.includes(searchTerm)) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            });
        });