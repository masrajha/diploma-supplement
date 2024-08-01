jQuery(document).ready(function($) {
    var options = {
        valueNames: ['npm', 'name', 'nomor-skpi', 'tanggal-transkrip'],
        page: 5, // Number of items per page
        pagination: true
    };

    var diplomaList = new List('diploma-table-container', options);

    var modal = $('#ds-modal');
    var iframe = $('#ds-modal-iframe');

    // Gunakan event delegation untuk menangani klik pada .ds-view-doc
    $(document).on('click', '.ds-view-doc', function(e) {
        e.preventDefault();
        var fileId = $(this).data('file-id');
        var url = 'https://drive.google.com/file/d/' + fileId + '/preview';
        iframe.attr('src', url);
        modal.show();
    });

    // Menutup modal
    $('.ds-close, .ds-modal').on('click', function() {
        modal.hide();
        iframe.attr('src', ''); // Mengosongkan src iframe untuk menghentikan pemutaran video atau file lainnya
    });

    // Mencegah penutupan modal ketika klik di dalam konten modal
    $('.ds-modal-content').on('click', function(e) {
        e.stopPropagation();
    });
});
