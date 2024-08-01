<?php
// URL CSV Google Sheet
$sheet_id = '119wjg7Z_jjZi0v7tmHpxOLZWaPhbzeV3k9I4daclJdI';
$sheet_name = 'Data Wisuda';
$csv_url = "https://docs.google.com/spreadsheets/d/$sheet_id/gviz/tq?tqx=out:csv&sheet=$sheet_name";

// Fetch CSV data
$response = wp_remote_get($csv_url);
$data = array();

if (is_array($response) && !is_wp_error($response)) {
    $csv_body = wp_remote_retrieve_body($response);
    $temp = tmpfile(); // Create a temporary file to store CSV data

    fwrite($temp, $csv_body); // Write CSV data to the temporary file
    fseek($temp, 0); // Rewind the file pointer to the start of the file

    // Use fgetcsv to parse the CSV data properly handling multiline fields
    while (($line = fgetcsv($temp, 0, ',', '"')) !== FALSE) {
        $data[] = $line;
    }

    fclose($temp); // Close the temporary file
}

$header = array_shift($data); // Extract header
?>

<div class="ds-container">
    <table id="diplomaTable" class="display">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Nomor SKPI</th>
                <th>Tanggal Transkrip</th>
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
