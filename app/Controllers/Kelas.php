<?php

namespace App\Controllers;

use App\Models\JurusanModel;
use App\Models\KelasModel;
use CodeIgniter\RESTful\ResourcePresenter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kelas extends ResourcePresenter
{
    protected $db;
    protected $jurusan;
    protected $kelas;

    public function __construct()
    {
        $this->jurusan = new JurusanModel();
        $this->kelas = new KelasModel();
    }

    public function index()
    {
        $data['kelas_data'] = $this->kelas->getAll();
        return view('kelas/index', $data);
    }

    public function new()
    {
        $data['jurusan_data'] = $this->jurusan->findAll();
        return view('kelas/new', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->kelas->insert($data);
        return redirect()->to(site_url('kelas'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $kelas = $this->kelas->find($id);
        if (is_object($kelas)) {
            $data['kelas_data'] = $kelas;
            $data['jurusan_data'] = $this->jurusan->findAll();
            return view('kelas/edit', $data);
        } else {
            return view('kelas/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->kelas->update($id, $data);
        return redirect()->to(site_url('kelas'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->kelas->delete($id);
        return redirect()->to(site_url('kelas'))->with('success', 'Data Berhasil Dihapus');
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $writer = new Xlsx($spreadsheet);

        $kelas_data = $this->kelas->getAll();

        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Kelas');
        $activeWorksheet->setCellValue('C1', 'Jurusan');

        $column = 2; // Kolom Start
        foreach ($kelas_data as $key => $value) {
            $activeWorksheet->setCellValue('A' . $column, ($column - 1));
            $activeWorksheet->setCellValue('B' . $column, $value->nama_kelas);
            $activeWorksheet->setCellValue('C' . $column, $value->nama_jurusan);
            $column++;
        }

        $activeWorksheet->getStyle('A1:C1')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A1:C1')->getFill()
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
        $activeWorksheet->getStyle('A1:C' . ($column - 1))->applyFromArray($styleArray);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachement;filename=kelas_data.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
