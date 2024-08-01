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

<div id="diploma-table-container">
    <input class="search" placeholder="Search" />
    <button class="sort" data-sort="name">Sort by Name</button>
    <button class="sort" data-sort="student-id">Sort by Student ID</button>

    <table id="diplomaTable" class="display">
        <thead>
        <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Document Number</th>
                <th>Graduation Date</th>
                <th>Preview</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td class="student-id"><?php echo esc_html($row[1]); ?></td> <!-- NPM -->
                        <td class="name"><?php echo esc_html($row[2]); ?></td> <!-- Nama -->
                        <td class="document-number"><?php echo esc_html($row[28]); ?></td> <!-- Nomor SKPI -->
                        <td class="graduation-date"><?php echo esc_html($row[7]); ?></td> <!-- Tanggal Transkrip -->
                        <td>
                            <a href="#" class="ds-view-doc" data-file-id="<?php echo esc_attr($row[44]); ?>">Preview</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <ul class="pagination"></ul>
</div>

<div id="ds-modal" class="ds-modal">
    <div class="ds-modal-content">
        <span class="ds-close">&times;</span>
        <iframe id="ds-modal-iframe" width="100%" height="480"></iframe>
    </div>
</div>
