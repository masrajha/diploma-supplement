jQuery(document).ready(function($) {
    // Inisialisasi DataTables
    $('#diplomaTable').DataTable();

    var modal = $('#ds-modal');
    var iframe = $('#ds-modal-iframe');

    $('.ds-view-doc').on('click', function(e) {
        e.preventDefault();
        var fileId = $(this).data('file-id');
        var url = 'https://drive.google.com/file/d/' + fileId + '/preview';
        iframe.attr('src', url);
        modal.show();
    });

    $('.ds-close, .ds-modal').on('click', function() {
        modal.hide();
        iframe.attr('src', '');
    });

    $('.ds-modal-content').on('click', function(e) {
        e.stopPropagation();
    });
});
