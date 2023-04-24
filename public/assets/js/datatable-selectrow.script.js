$(document).ready(function() {
    var table = $('table').DataTable();

    $('table tbody').on('click', 'tr', function() {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $('tr.odd.selected').removeClass('selected');
            $('tr.even.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
});
