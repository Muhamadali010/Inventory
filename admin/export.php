<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include "../inc/koneksi.php";

// Fetch data from database
$query = $conn->query("SELECT * FROM barang");
$data = $query->fetch_all(MYSQLI_ASSOC);

// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set document properties
$spreadsheet->getProperties()->setCreator('Your Name')
    ->setLastModifiedBy('Your Name')
    ->setTitle('Inventory Barang')
    ->setSubject('Inventory Barang')
    ->setDescription('Daftar Inventory Barang')
    ->setKeywords('inventory barang')
    ->setCategory('Report');

// Add header
$sheet->setCellValue('A1', 'Kode Barang');
$sheet->setCellValue('B1', 'Nama Barang');
$sheet->setCellValue('C1', 'Status Barang');
$sheet->setCellValue('D1', 'Penyimpanan');
$sheet->setCellValue('E1', 'Harga Barang');

// Add data
$row = 2;
foreach ($data as $item) {
    $sheet->setCellValue('A' . $row, 'rz' . $item['id']);
    $sheet->setCellValue('B' . $row, $item['nama_barang']);
    $sheet->setCellValue('C' . $row, $item['status_barang']);
    $sheet->setCellValue('D' . $row, $item['penyimpanan_barang']);
    $sheet->setCellValue('E' . $row, $item['harga_barang']);
    $row++;
}

// Write to .xlsx file
$writer = new Xlsx($spreadsheet);
$filename = 'Inventory_Barang.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>