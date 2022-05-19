<?php
require '3-protect.php';
define('config', true);
require_once __DIR__ . '/../../CMStra_db/config.php';

//https://stackoverflow.com/questions/3986469/export-sqlite-table-using-php

// Set headers to make the browser download the results as a csv file
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=CMStra_db.csv");
header("Pragma: no-cache");
header("Expires: 0");



// Query
$query = $db->query("SELECT * FROM contents");

// Fetch the first row
$row = $query->fetch(PDO::FETCH_ASSOC);

// If no results are found, echo a message and stop
if ($row == false) {
  echo "No results";
  exit;
}

// Print the titles using the first line
print_titles($row);
// Iterate over the results and print each one in a line
while ($row != false) {
  // Print the line
  echo implode(array_values($row), "|") . "\n";
  // Fetch the next line
  $row = $query->fetch(PDO::FETCH_ASSOC);
}

// Prints the column names
function print_titles($row)
{
  echo implode(array_keys($row), "|") . "\n";
}





