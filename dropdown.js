document.addEventListener('DOMContentLoaded', function() {
    const dropdowns = document.querySelectorAll('.dropdown');
    
    dropdowns.forEach(dropdown => {
        const dropbtn = dropdown.querySelector('.dropbtn');
        const dropdownContent = dropdown.querySelector('.dropdown-content');
        
        dropbtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            document.querySelectorAll('.dropdown-content').forEach(content => {
                if (content !== dropdownContent) {
                    content.classList.remove('show');
                }
            });
            
            dropdownContent.classList.toggle('show');
        });
        
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target)) {
                dropdownContent.classList.remove('show');
            }
        });
    });
}); 