require('./bootstrap');

$(document).ready(function() {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    // Data table
    $('.dataTable').DataTable();
});