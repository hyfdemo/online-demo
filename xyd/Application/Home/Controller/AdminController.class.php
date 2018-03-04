<?php
namespace Home\Controller;
use Think\Controller;
Vendor('Image.Image');
//搬迁整个项目，需要修改上传文件的路径
class AdminController extends Controller {
   
    public function index(){
        if(!$_GET['p']){
            $list =M('name')->field('name,nickname,coll,img,address,content')->limit(0,10)->select();
            $count      = M('name')->count();
            $Page       = new \Think\Page($count,10);
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show       = $Page->show();
            $this->assign('page',$show);
        } else{
            $list =M('name')->field('name,nickname,coll,img,address,content')->order('id')->page($_GET['p'].',10')->select();
            $count      =M('name')->count();
            $Page       = new \Think\Page($count,10);
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show       = $Page->show();
            $this->assign('page',$show);
        }
		
        $this->assign('data',$list);
        $this->display();
    }

    public function Lucky_draw(){
		if(IS_AJAX){
			$data=M('name')->order('rand()')->limit(5)->field('name,address,coll,content')->select();
			if($data){
				$this->ajaxReturn($data);
			}
		}
		
	}	

}