<?php

namespace App\Controllers;

use App\Models\JurusanModel;
use CodeIgniter\RESTful\ResourcePresenter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurusan extends ResourcePresenter
{
    protected $db;
    protected $jurusan;

    public function __construct()
    {
        $this->jurusan = new JurusanModel();
    }

    public function index()
    {
        $data['jurusan_data'] = $this->jurusan->findAll();
        return view('jurusan/index', $data);
    }

    public function new()
    {
        return view('jurusan/new');
    }

    public function create()
    {
        $validate = $this->validate([
            'nama_jurusan' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Jurusan tidak boleh kosong',
                    'min_length' => 'Nama Jurusan minimal 3 karakter',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getPost();
        $this->jurusan->insert($data);
        return redirect()->to(site_url('jurusan'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $jurusan = $this->jurusan->where('id_jurusan', $id)->first();
        if (is_object($jurusan)) {
            $data['jurusan_data'] = $jurusan;
            return view('jurusan/edit', $data);
        } else {
            return view('jurusan/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->jurusan->update($id, $data);
        return redirect()->to(site_url('jurusan'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->jurusan->delete($id);
        return redirect()->to(site_url('jurusan'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['jurusan_data'] = $this->jurusan->onlyDeleted()->findAll();
        return view('jurusan/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('jurusan')
                ->set('deleted_at', null, true)
                ->where(['id_jurusan' => $id])
                ->update();
        } else {
            $this->db->table('jurusan')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('jurusan'))->with('success', 'Data Berhasil Direstore');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->jurusan->delete($id, true);
            return redirect()->to(site_url('jurusan/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->jurusan->purgeDeleted();
            return redirect()->to(site_url('jurusan/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $writer = new Xlsx($spreadsheet);

        $jurusan_data = $this->jurusan->findAll();

        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Nama Jurusan');
        $activeWorksheet->setCellValue('C1', 'Keterangan');

        $column = 2; // Kolom Start
        foreach ($jurusan_data as $key => $value) {
            $activeWorksheet->setCellValue('A' . $column, ($column - 1));
            $activeWorksheet->setCellValue('B' . $column, $value->nama_jurusan);
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
        header('Content-Disposition: attachement;filename=jurusan_data.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function import()
    {
        require "../../vendor/autoload.php";

        if (isset($_POST['submit'])) {
            $err = "";
            $ekstensi = "";
            $success = "";

            $file_name = $_FILES['filexls']['name']; // Untuk mendapatkan nama file yang diupload
            $file_data = $_FILES['filexls']['tmp_name']; // Untuk mendapatkan temporary data

            if (empty($file_name)) {
                $err .= "Silahkan masukkan file yang kamu inginkan";
            } else {
                $ekstensi = pathinfo($file_name)['extension'];
            }

            $ekstensi_allowed = array("xls", "xlsx");
            if (!in_array($ekstensi, $ekstensi_allowed)) {
                $err .= "Silahkan masukkan file tipe xls atau xlsx. File $file_name yang kamu masukkan punya tipe $ekstensi";
            }

            if (empty($err)) {
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
                $spreadsheet = $reader->load($file_data);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();

                $jumlahData = 0;
                for ($i = 1; $i < count($sheetData); $i++) {
                    $nisn = $sheetData[$i]['0'];
                    $password = $sheetData[$i]['1'];
                    $nama = $sheetData[$i]['2'];
                    $kelas = $sheetData[$i]['3'];

                    $query_check = "SELECT COUNT(*) FROM siswa WHERE nisn = '$nisn'";
                    $result_check = mysqli_query($conn, $query_check);
                    $row = mysqli_fetch_row($result_check);

                    if ($row[0] == 0) {
                        $sql1 = "INSERT INTO siswa (nisn, password, nama, kelas) VALUES ('$nisn', '$password', '$nama', '$kelas')";
                        mysqli_query($conn, $sql1);
                        $jumlahData++;
                    } else {
                        continue;
                    }
                }

                if ($jumlahData > 0) {
                    $success = "Jumlah Data Berhasil Dimasukkan";
                }
                header("refresh:0.5;url=datasiswa.php");
            }

            if ($err) {
                echo "<script>alert('$err')</script>";
            }

            if ($success) {
                echo "<script>alert('$success')</script>";
            }
        }
    }
}
