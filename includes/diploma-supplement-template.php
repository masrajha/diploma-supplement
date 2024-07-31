<?php
// URL CSV Google Sheet
$sheet_id = '119wjg7Z_jjZi0v7tmHpxOLZWaPhbzeV3k9I4daclJdI';
$sheet_name = 'Data Wisuda';
$csv_url = "https://docs.google.com/spreadsheets/d/$sheet_id/gviz/tq?tqx=out:csv&sheet=$sheet_name";

// Mengambil data CSV
$response = wp_remote_get($csv_url);
if (is_array($response) && !is_wp_error($response)) {
    $csv_body = wp_remote_retrieve_body($response);
    $data = array_map('str_getcsv', explode("\n", $csv_body));
    $header = array_shift($data); // Mengambil header
}
?>

<div class="ds-container">
    <table id="diplomaTable" class="display">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Document Number</th>
                <th>Graduate Date</th>
                <th>Preview</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?php echo esc_html($row[1]); ?></td> <!-- NPM -->
                        <td><?php echo esc_html($row[2]); ?></td> <!-- Nama -->
                        <td><?php echo esc_html($row[30]); ?></td> <!-- Nomor SKPI -->
                        <td><?php echo esc_html($row[7]); ?></td> <!-- Tanggal Transkrip -->
                        <td>
                            <a href="#" class="ds-view-doc" data-file-id="<?php echo esc_attr($row[41]); ?>">Preview</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div id="ds-modal" class="ds-modal">
    <div class="ds-modal-content">
        <span class="ds-close">&times;</span>
        <iframe id="ds-modal-iframe" width="100%" height="480"></iframe>
    </div>
</div>
