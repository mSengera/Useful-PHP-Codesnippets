/*
 * Import a CSV file into a php array
 */
private function _CSV2Array($filename, $k_delimiter = NULL, $delimiter = ';', $enclosure = '"') {
    $row = 0;
    $col = 0;

    $handle = @fopen($filename, "r");
    if ($handle) {
        while (($row = fgetcsv($handle, 4096, $delimiter, $enclosure)) !== false) {
            if (empty($fields)) {
                $fields = $row;
                continue;
            }

            foreach ($row as $k => $value) {
                if($k_delimiter != NULL && $k >= $k_delimiter) {
                    break;
                }

                $results[$col][$fields[$k]] = $value;
            }

            $col++;
            unset($row);
        }

        if (!feof($handle)) {
            echo "Error: unexpected fgets() failn";
        }

        fclose($handle);
    }

    return $results;
}
