<?php

namespace App\Controllers;

use App\Models\RecordModel;
use CodeIgniter\Files\File;

class Home extends BaseController
{
    public function index()
    {
        $data = array();
        $data['session'] = session();
        return view('home', $data);
    }

    public function upload()
    {
        helper(['form']);
        $rules = [
            'excelfile' => [
                'label' => 'Excel File',
                'rules' => 'uploaded[excelfile]|max_size[excelfile,5000]|ext_in[excelfile,xls,xlsx],',
            ],
        ];
        if ($this->validate($rules)) {
            $file = $this->request->getFile('excelfile');

            if (!$file->hasMoved()) {

                $filepath = WRITEPATH . 'uploads/' . $file->store();
                $fileinfo = new File($filepath);

                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filepath);

                $worksheet = $spreadsheet->getActiveSheet();
                $highestRow = $worksheet->getHighestRow();

                $excelArr = array();
                $i = 0;

                for ($row = 2; $row <= $highestRow; ++$row) {
                    $excelArr[$i]['last_name'] = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $excelArr[$i]['first_name'] = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $excelArr[$i]['middle_name'] = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $excelArr[$i]['address'] = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $excelArr[$i]['phone'] = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $excelArr[$i]['mobile'] = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $excelArr[$i]['email'] = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $i++;
                }

                $count = 0;
                foreach ($excelArr as $record) {
                    $records = new RecordModel();
                    if ($records->insert($record)) {
                        $count++;
                    }
                }
                session()->setFlashdata('message', $count . ' rows successfully added.');
                session()->setFlashdata('bg-class', 'bg-success');
            } else {
                session()->setFlashdata('message', 'Record file coud not be imported.');
                session()->setFlashdata('bg-class', 'bg-danger');
            }
            return redirect()->route('/');
        } else {
            $data['validation'] = $this->validator;
            $data['session'] = session();
            return view('home', $data);
        }
    }
}
