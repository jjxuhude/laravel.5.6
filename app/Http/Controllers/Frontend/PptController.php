<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller;
use App\Model\User;
use App\Model\Address;
use App\Model\Post;

use PhpOffice\Common\Adapter\Zip\PclZipAdapter;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;


class PptController extends Controller
{

    
    /**
     * @desc  Ppt模板测试
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function index()
    {
        return parent::index();
    }

    /**
     * @desc 创建
     * @method GET
     * @param
     * @return mixed
     */
    function create(){
        // 2.创建ppt对象
        $objPHPPowerPoint = new PhpPresentation();
        $objPHPPowerPoint-> markAsFinal(true);
        $state  =  $objPHPPowerPoint -> isMarkedAsFinal();

        // 3.设置属性
        $objPHPPowerPoint->getDocumentProperties()->setCreator('PHPOffice')
            ->setLastModifiedBy('PHPPresentation Team')
            ->setTitle('Sample 02 Title')
            ->setSubject('Sample 02 Subject')
            ->setDescription('Sample 02 Description')
            ->setKeywords('office 2007 openxml libreoffice odt php')
            ->setCategory('Sample Category');

        // 4.删除第一页(多页最好删除)
        $objPHPPowerPoint->removeSlideByIndex(0);

        //根据需求 调整for循环
        for ($i = 1; $i <= 3; $i++) {
            //创建幻灯片并添加到这个演示中
            $slide = $objPHPPowerPoint->createSlide();

            //创建一个形状(图)
            $shape = $slide->createDrawingShape();
            $shape->setName('内容图片name')
                ->setDescription('内容图片 描述')
                ->setPath(base_path('public/uploads/'.$i.'.png'))
                ->setResizeProportional(false)
                ->setHeight(720)
                ->setWidth(960);

            //创建一个形状(文本)
            $shape = $slide->createRichTextShape()
                ->setHeight(60)
                ->setWidth(960)
                ->setOffsetX(10)
                ->setOffsetY(50);
            $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $textRun = $shape->createTextRun('以后这个就是标题了');
            $textRun->getFont()->setBold(true)
                ->setSize(20)
                ->setColor(new Color('FFE06B20'));


            // 创建一个形状(文本)
            $shape = $slide->createRichTextShape()
                ->setHeight(60)
                ->setWidth(960)
                ->setOffsetX()
                ->setOffsetY(700);
            $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $textRun = $shape->createTextRun('时间:'.date("Y-m-d H:i:s"));
            $textRun->getFont()->setBold(true)
                ->setSize(10)
                ->setColor(new Color('FFE06B20'));

        }
        $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
        $url = base_path("public/uploads/ppt/" . time() . ".pptx");
        //生成PPT
        $oWriterPPTX->save($url);
        //下载PPT
        $this->download($url);
        //删除PPT
        $this->deldir($url);
        exit;
    }

    /**
     * @desc 下载
     * @param $file
     */
    function download($file)
    {
        if(file_exists($file)){
            header("Content-type:application/octet-stream");
            $filename = basename($file);
            header("Content-Disposition:attachment;filename = ".$filename);
            header("Accept-ranges:bytes");
            header("Accept-length:".filesize($file));
            readfile($file);
        }else{
            echo "<script>alert('文件不存在')</script>";
        }
    }

    /**
     * @desc 删除
     * @param $dir
     */
    function deldir($dir)
    {
        unlink($dir);
        closedir($dir);
    }


    

    
   
}

