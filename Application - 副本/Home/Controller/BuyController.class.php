<?php 

namespace Home\Controller;
use Think\Controller;
class BuyController extends Controller{
	/**
	 * 购买信息主页
	 * ================
	 * @AuthorHTL
	 * @DateTime  2017-03-07T10:26:46+0800
	 * ================
	 * @return    [type]                   [description]
	 */
	/**
	 * [header description]
	 * ================
	 * @AuthorHTL
	 * @DateTime  2017-04-14T10:08:32+0800
	 * ================
	 * @return    [type]                   [description]
	 */
	public  function header(){
		$this->display();
	}
	public function index(){
		
		$Buyinfo = M('buyinfo'); // 实例化Buyinfo对象
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$data = $Buyinfo->order('bdate desc')->page($_GET['p'].',15')->select();
		$this->assign('data',$data);// 赋值数据集
		$count = $Buyinfo->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('prev', '上一页');
	 	$Page->setConfig('next', '下一页');
	 	$Page->setConfig('last', '末页');
	 	$Page->setConfig('first', '首页');
		$Page->setConfig("theme" ,"共%TOTAL_ROW%条数据  %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% ");
		// $Page->setConfig("theme" ,"共%TOTAL_ROW%个数据 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");

		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		// $this->assign('count',$count);
		$this->display(); // 输出模板

		// print_r("SESSION是：". $_SESSION['var']);





	}
	/**
	 * 增加购买记录
	 * ================
	 * @AuthorHTL
	 * @DateTime  2017-03-07T10:27:29+0800
	 * ================
	 */
	public function add(){
		//print_r($getinfo);
		// echo "asdf";
		// $info['bname'] = $getinfo['bname'];

		$data=$_POST;
		$data['bname'] = trim($data['bname']);
		$data['bprice'] = trim($data['bprice']);
		$data['buser'] = trim($data['buser']);
		$data['bnum'] = trim($data['bnum']);
		$data['bpayer'] = trim($data['bpayer']);
		 $Buy = M('buyinfo');
		//p($data);
		if(empty($data['bname'])){
			$this->error('品名不能为空啊！');
		};
		if(empty($data['bprice'])){
			$this->error('价格不能为空！');
		}elseif(empty($data['buser'])){
			$this->error('使用者信息不能为空！');
		}
			$result = $Buy->add($data); 
			if($result){
			    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
			    $this->success('新增成功', 'index');
			} else {
			    //错误页面的默认跳转页面是返回前一页，通常不需要设置
			    $this->error('新增失败');
			}
				
		
	//	p($data);
	//	die;

		
		
		
		
		
	}

	/**
	 * 修改购买记录
	 * ================
	 * @AuthorHTL
	 * @DateTime  2017-03-07T10:28:03+0800
	 * ================
	 * @return    [type]                   [description]
	 */
	public function edit(){
			
			

			
				$Form = M('buyinfo');
				$data = $_GET['bid'];
				// echo $data;
				
				// $map['bid'] =$data;
				$this->row=$Form->find($data);
				p($result);
				
				// $this->assign('data',$result);// 赋值数据集
				$this->display();
			
	}


	public function update(){

			$Form = M('buyinfo');
			$Form->create();
			if($Form->save()){
				  $this->success('修改成功', U('Buy/Index'));
			}else{
			
				  $this->error('修改失败');
			};


	}
	
	public function del(){
	
		$id = $_GET['bid'];
		//p($data);
		$Form = M('buyinfo');
		$result = $Form->delete($id);
		if($result){
			    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
			    $this->success('删除成功', U('Buy/Index'));
			} else {
			    //错误页面的默认跳转页面是返回前一页，通常不需要设置
			    $this->error('删除失败');
			}
	
	}





}
