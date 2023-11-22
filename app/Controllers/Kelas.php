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
    protected $helpers = ['custom'];

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
        $validate = $this->validate([
            'nama_kelas' => [
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => 'Nama Kelas tidak boleh kosong',
                    'min_length' => 'Nama Kelas minimal 2 karakter',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }
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

    public function import()
    {
        $file = $this->request->getFile('file_excel');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $kelas = $spreadsheet->getActiveSheet()->toArray();
            foreach ($kelas as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'nama_kelas' => $value[1],
                    'id_jurusan' => $value[2],
                ];
                $this->kelas->insert($data);
            }
            return redirect()->back()->with('success', 'Data excel berhasil diimpor');
        } else {
            return redirect()->back()->with('errors', 'Format file tidak sesuai');
        }
    }
}
