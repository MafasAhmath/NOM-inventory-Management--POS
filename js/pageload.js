
// Load default content (dashboard)
$("#sidebar").ready(function () {
        
    // Function to handle button clicks and load content
    function loadContent(url) {
        $("#content-section").load(url);
    }
    
    // Event listener for button clicks
    $(".sidebar-link").click(function (event) {
        event.preventDefault(); // Prevent default link behavior
    
        // Get the URL from the data-url attribute of the clicked button
        const url = $(this).data('url');
    
        // Load content based on the URL
        loadContent(url);        
        
    });
    loadContent("./dashboard.php");  
});