<?php

namespace App\Controllers;

use App\Models\TahunAjaranModel;
use CodeIgniter\RESTful\ResourcePresenter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TahunAjaran extends ResourcePresenter
{
    protected $db;
    protected $tahunajaran;
    protected $helpers = ['custom'];

    public function __construct()
    {
        $this->tahunajaran = new TahunAjaranModel();
    }

    public function index()
    {
        $data['tahunajaran_data'] = $this->tahunajaran->findAll();
        return view('tahunajaran/index', $data);
    }

    public function new()
    {
        return view('tahunajaran/new');
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->tahunajaran->insert($data);
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $tahunajaran = $this->tahunajaran->where('id_tahunajaran', $id)->first();
        if (is_object($tahunajaran)) {
            $data['tahunajaran_data'] = $tahunajaran;
            return view('tahunajaran/edit', $data);
        } else {
            return view('tahunajaran/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->tahunajaran->update($id, $data);
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->tahunajaran->delete($id);
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['tahunajaran_data'] = $this->tahunajaran->onlyDeleted()->findAll();
        return view('tahunajaran/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('tahun_ajaran')
                ->set('deleted_at', null, true)
                ->where(['id_tahunajaran' => $id])
                ->update();
        } else {
            $this->db->table('tahun_ajaran')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('tahunajaran'))->with('success', 'Data Berhasil Direstore');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->tahunajaran->delete($id, true);
            return redirect()->to(site_url('tahunajaran/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->tahunajaran->purgeDeleted();
            return redirect()->to(site_url('tahunajaran/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $writer = new Xlsx($spreadsheet);

        $tahunajaran_data = $this->tahunajaran->findAll();

        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Tahun');
        $activeWorksheet->setCellValue('C1', 'Keterangan');

        $column = 2; // Kolom Start
        foreach ($tahunajaran_data as $key => $value) {
            $activeWorksheet->setCellValue('A' . $column, ($column - 1));
            $activeWorksheet->setCellValue('B' . $column, $value->tahun);
            $activeWorksheet->setCellValue('C' . $column, $value->keterangan);
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
        header('Content-Disposition: attachement;filename=tahunajaran_data.xlsx');
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
            $tahunajaran = $spreadsheet->getActiveSheet()->toArray();
            foreach ($tahunajaran as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'tahun' => $value[1],
                    'keterangan' => $value[2],
                ];
                $this->tahunajaran->insert($data);
            }
            return redirect()->back()->with('success', 'Data excel berhasil diimpor');
        } else {
            return redirect()->back()->with('errors', 'Format file tidak sesuai');
        }
    }
}
