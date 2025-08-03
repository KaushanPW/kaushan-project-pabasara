
document.getElementById('showMoreBtn').addEventListener('click', function () {
    document.getElementById('more-products').style.display = 'flex';
    this.style.display = 'none';
    document.getElementById('showLessBtn').style.display = 'inline-block';
    document.getElementById('more-products').scrollIntoView({ behavior: 'smooth' });
});

document.getElementById('showLessBtn').addEventListener('click', function () {
    document.getElementById('more-products').style.display = 'none';
    this.style.display = 'none';
    document.getElementById('showMoreBtn').style.display = 'inline-block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
});




const texts = ["What are you need?...🤔🤔🤔", "Fresh Vegetables �🥕🍆🥔🥥", "Fast Delivery 👉..🚚🚛🚐"];
let count = 0;
let index = 0;
let currentText = '';
let letter = '';

(function type() {
    if (count === texts.length) {
        count = 0;
    }
    currentText = texts[count];
    letter = currentText.slice(0, ++index);

    document.getElementById('typewriter').textContent = letter;
    if (letter.length === currentText.length) {
        count++;
        index = 0;
        setTimeout(type, 2000); 
    } else {
        setTimeout(type, 150); 
    }
})();




document.addEventListener('DOMContentLoaded', function() {
    const productCards = document.querySelectorAll('.product-card');
    const searchBar = document.querySelector('.search-bar');
    const searchBtn = document.querySelector('.search-btn');
    const allProducts = Array.from(productCards).concat(
        Array.from(document.querySelectorAll('#more-products .product-card'))
    );
    
   
    function performSearch() {
        const searchTerm = searchBar.value.trim().toLowerCase();
        
        if (searchTerm === '') {
            
            allProducts.forEach(card => {
                card.style.display = 'block';
            });
            return;
        }
        
        
        allProducts.forEach(card => {
            const productName = card.querySelector('h3').textContent.toLowerCase();
            if (productName.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
        
        
        const moreProductsSection = document.getElementById('more-products');
        const hasVisibleInMore = Array.from(moreProductsSection.querySelectorAll('.product-card'))
            .some(card => card.style.display !== 'none');
        
        if (hasVisibleInMore) {
            moreProductsSection.style.display = 'grid';
        }
    }
    
   
    searchBtn.addEventListener('click', performSearch);
    
    searchBar.addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
});