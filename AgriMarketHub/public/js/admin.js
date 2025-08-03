$(document).ready(function() {
    // Toggle active class on sidebar links
    $('.sidebar-nav li a').click(function() {
        $('.sidebar-nav li a').removeClass('active');
        $(this).addClass('active');
    });
    
    // Confirm before deleting
    $('.btn-delete').click(function(e) {
        if (!confirm('Are you sure you want to delete this item?')) {
            e.preventDefault();
        }
    });
});