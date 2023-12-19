function toggleNavbar(event) {
    const sidebar = document.getElementById('sidebar');
    const body = document.body; // Added body reference
    const toggleIcon = document.getElementById('navbar-toggle');

    // Check if the click occurred on the toggle icon or its child elements
    if (event.target === toggleIcon || toggleIcon.contains(event.target)) {
        if (sidebar.style.left === '-250px' || sidebar.style.left === '') {
            sidebar.style.left = '0';
            body.style.marginLeft = '250px'; // Added to shift content when sidebar is open
        } else {
            sidebar.style.left = '-250px';
            body.style.marginLeft = '0'; // Reset margin when sidebar is closed
        }
    }
}