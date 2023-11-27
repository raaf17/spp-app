<?php

namespace App\Controllers;

use App\Models\PetugasModel;
use CodeIgniter\RESTful\ResourcePresenter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Petugas extends ResourcePresenter
{
    protected $db;
    protected $petugas;
    protected $helpers = ['custom'];

    public function __construct()
    {
        $this->petugas = new PetugasModel();
    }

    public function index()
    {
        $data['petugas_data'] = $this->petugas->findAll();
        return view('petugas/index', $data);
    }

    public function new()
    {
        return view('petugas/new');
    }

    public function create()
    {
        $validate = $this->validate([
            'username' => [
                'rules' => 'required|max_length[30]|min_length[3]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong',
                    'max_length' => 'Username maksimal 30 karakter',
                    'min_length' => 'Username minimal 3 karakter',
                ],
            ],
            'email' => [
                'rules' => 'required|min_length[3]|max_length[30]|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'max_length' => 'Email maksimal 30 karakter',
                    'min_length' => 'Email minimal 3 karakter',
                    'valid_email' => 'Email yang anda masukkan tidak valid',
                ],
            ], 
            'password' => [
                'rules' => 'required|max_length[20]|min_length[3]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'max_length' => 'Password maksimal 30 karakter',
                    'min_length' => 'Password minimal 3 karakter',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getPost();
        $this->petugas->insert($data);
        return redirect()->to(site_url('petugas'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $petugas = $this->petugas->where('id_user', $id)->first();
        if (is_object($petugas)) {
            $data['petugas_data'] = $petugas;
            return view('petugas/edit', $data);
        } else {
            return view('petugas/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->petugas->update($id, $data);
        return redirect()->to(site_url('petugas'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->petugas->delete($id);
        return redirect()->to(site_url('petugas'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['petugas_data'] = $this->petugas->onlyDeleted()->findAll();
        return view('petugas/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('users')
                ->set('deleted_at', null, true)
                ->where(['id_user' => $id])
                ->update();
        } else {
            $this->db->table('users')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('petugas'))->with('success', 'Data Berhasil Direstore');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->petugas->delete($id, true);
            return redirect()->to(site_url('petugas/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->petugas->purgeDeleted();
            return redirect()->to(site_url('petugas/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $writer = new Xlsx($spreadsheet);

        $petugas_data = $this->petugas->findAll();

        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Username');
        $activeWorksheet->setCellValue('C1', 'Email');
        $activeWorksheet->setCellValue('D1', 'Nama Petugas');
        $activeWorksheet->setCellValue('E1', 'Level');

        $column = 2; // Kolom Start
        foreach ($petugas_data as $key => $value) {
            $activeWorksheet->setCellValue('A' . $column, ($column - 1));
            $activeWorksheet->setCellValue('B' . $column, $value->username);
            $activeWorksheet->setCellValue('C' . $column, $value->email);
            $activeWorksheet->setCellValue('D' . $column, $value->nama_petugas);
            $activeWorksheet->setCellValue('E' . $column, $value->level);
            $column++;
        }

        $activeWorksheet->getStyle('A1:E1')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A1:E1')->getFill()
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
        $activeWorksheet->getStyle('A1:E' . ($column - 1))->applyFromArray($styleArray);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachement;filename=petugas_data.xlsx');
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
            $petugas = $spreadsheet->getActiveSheet()->toArray();
            foreach ($petugas as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'username' => $value[1],
                    'email' => $value[2],
                    'password' => $value[3],
                    'nama_petugas' => $value[4],
                    'level' => $value[5],
                ];
                $this->petugas->insert($data);
            }
            return redirect()->back()->with('success', 'Data excel berhasil diimpor');
        } else {
            return redirect()->back()->with('errors', 'Format file tidak sesuai');
        }
    }
}
