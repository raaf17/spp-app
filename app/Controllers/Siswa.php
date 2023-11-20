<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use CodeIgniter\RESTful\ResourcePresenter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Siswa extends ResourcePresenter
{
    protected $db;
    protected $kelas;
    protected $siswa;
    protected $helpers = ['custom'];

    public function __construct()
    {
        $this->kelas = new KelasModel();
        $this->siswa = new SiswaModel();
    }

    public function index()
    {
        $data['siswa_data'] = $this->siswa->getAll();
        return view('siswa/index', $data);
    }

    public function new()
    {
        $data['kelas_data'] = $this->kelas->findAll();
        return view('siswa/new', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->siswa->insert($data);
        return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $siswa = $this->siswa->find($id);
        if (is_object($siswa)) {
            $data['siswa_data'] = $siswa;
            $data['kelas_data'] = $this->kelas->findAll();
            return view('siswa/edit', $data);
        } else {
            return view('siswa/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->siswa->update($id, $data);
        return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->siswa->delete($id);
        return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Dihapus');
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $writer = new Xlsx($spreadsheet);

        $siswa_data = $this->siswa->getAll();

        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Nama Siswa');
        $activeWorksheet->setCellValue('C1', 'NIS');
        $activeWorksheet->setCellValue('D1', 'NISN');
        $activeWorksheet->setCellValue('E1', 'Kelas');
        $activeWorksheet->setCellValue('F1', 'Jenis Kelamin');
        $activeWorksheet->setCellValue('G1', 'No. Telepon');

        $column = 2; // Kolom Start
        foreach ($siswa_data as $key => $value) {
            $activeWorksheet->setCellValue('A' . $column, ($column - 1));
            $activeWorksheet->setCellValue('B' . $column, $value->nama_siswa);
            $activeWorksheet->setCellValue('C' . $column, $value->nis);
            $activeWorksheet->setCellValue('D' . $column, $value->nisn);
            $activeWorksheet->setCellValue('E' . $column, $value->nama_kelas);
            $activeWorksheet->setCellValue('F' . $column, $value->jenis_kelamin);
            $activeWorksheet->setCellValue('G' . $column, $value->no_telp);
            $column++;
        }

        $activeWorksheet->getStyle('A1:G1')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A1:G1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ]
            ],
        ];
        $activeWorksheet->getStyle('A1:G' . ($column - 1))->applyFromArray($styleArray);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('F')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('G')->setAutoSize(true);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachement;filename=siswa_data.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
