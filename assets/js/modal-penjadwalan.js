$(document).ready(function() {
    for (B = 1; B <= 1; B++) {
        newcolumn();
    }
    $('#newcolumn').click(function(e) {
        e.preventDefault();
        newcolumn();
    });

    $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
});