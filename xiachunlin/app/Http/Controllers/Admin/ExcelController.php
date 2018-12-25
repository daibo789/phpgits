<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入Excel
use Excel;
class ExcelController extends Controller
{
    //Excel文件导出功能 By Laravel学院
    public function export(){
        $cellData = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        Excel::create('学生成绩',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');

        //如果你要导出csv或者xlsx文件，只需将 export 方法中的参数改成csv或xlsx即可。
        //如果还要将该Excel文件保存到服务器上，可以使用 store 方法：
//        Excel::create('学生成绩',function($excel) use ($cellData){
//            $excel->sheet('score', function($sheet) use ($cellData){
//                $sheet->rows($cellData);
//            });
//        })->store('xls')->export('xls');

        //文件默认保存到 storage/exports 目录下，如果出现文件名中文乱码，将上述代码文件名做如下修改即可
        //：
//        iconv('UTF-8', 'GBK', '学生成绩');



    }


    //5.导入Excel文件
    //我们将刚才保存到服务器上的Excel文件导入进来，导入很简单，使用 Excel 门面上的 load 方法即可：
    public function import(){
        $filePath = 'storage/exports/'.iconv('UTF-8', 'GBK', '学生成绩').'.xls';
        Excel::load($filePath, function($reader) {
            $data = $reader->all();
            dd($data);
        });
    }

}
