<?php

namespace App\Controllers;

use App\Models\TagihanModel;
use CodeIgniter\RESTful\ResourcePresenter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tagihan extends ResourcePresenter
{
    protected $db;
    protected $tagihan;
    protected $helpers = ['custom'];

    public function __construct()
    {
        $this->tagihan = new TagihanModel();
    }

    public function index()
    {
        $data['tagihan_data'] = $this->tagihan->findAll();
        return view('tagihan/index', $data);
    }

    public function new()
    {
        return view('tagihan/new');
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->tagihan->insert($data);
        return redirect()->to(site_url('tagihan'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $tagihan = $this->tagihan->where('id_tagihan', $id)->first();
        if (is_object($tagihan)) {
            $data['tagihan_data'] = $tagihan;
            return view('tagihan/edit', $data);
        } else {
            return view('tagihan/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->tagihan->update($id, $data);
        return redirect()->to(site_url('tagihan'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->tagihan->delete($id);
        return redirect()->to(site_url('tagihan'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['tagihan_data'] = $this->tagihan->onlyDeleted()->findAll();
        return view('tagihan/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('tagihan')
                ->set('deleted_at', null, true)
                ->where(['id_tagihan' => $id])
                ->update();
        } else {
            $this->db->table('tagihan')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('tagihan'))->with('success', 'Data Berhasil Direstore');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->tagihan->delete($id, true);
            return redirect()->to(site_url('tagihan/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->tagihan->purgeDeleted();
            return redirect()->to(site_url('tagihan/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $writer = new Xlsx($spreadsheet);

        $tagihan_data = $this->tagihan->findAll();

        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Nama Tagihan');
        $activeWorksheet->setCellValue('C1', 'Nominal');
        $activeWorksheet->setCellValue('D1', 'Bulanan');
        $activeWorksheet->setCellValue('E1', 'Keterangan');
        $activeWorksheet->setCellValue('F1', 'Tanggal');

        $column = 2; // Kolom Start
        foreach ($tagihan_data as $key => $value) {
            $activeWorksheet->setCellValue('A' . $column, ($column - 1));
            $activeWorksheet->setCellValue('B' . $column, $value->nama_tagihan);
            $activeWorksheet->setCellValue('C' . $column, $value->nominal);
            $activeWorksheet->setCellValue('D' . $column, $value->bulanan);
            $activeWorksheet->setCellValue('E' . $column, $value->keterangan);
            $activeWorksheet->setCellValue('F' . $column, $value->tanggal);
            $column++;
        }

        $activeWorksheet->getStyle('A1:F1')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A1:F1')->getFill()
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
        $activeWorksheet->getStyle('A1:F' . ($column - 1))->applyFromArray($styleArray);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('F')->setAutoSize(true);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachement;filename=tagihan_data.xlsx');
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
            $ttagihan = $spreadsheet->getActiveSheet()->toArray();
            foreach ($ttagihan as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'nama_tagihan' => $value[1],
                    'nominal' => $value[2],
                    'bulanan' => $value[3],
                    'keterangan' => $value[4],
                    'tanggal' => $value[5],
                ];
                $this->tagihan->insert($data);
            }
            return redirect()->back()->with('success', 'Data excel berhasil diimpor');
        } else {
            return redirect()->back()->with('errors', 'Format file tidak sesuai');
        }
    }
}
