<?php  
	include "models/frontend/mainModel.php";
	class mainController extends Controller{
		use mainModel;
		public function index(){
			//lấy danh sách sản phẩm nối bật
			$hotproduct = $this->hotproduct();//hàm này trong model
			//lấy danh sách sản phẩm mới
			$newproduct = $this->newproduct();//hàm này trong model
			$this->renderHTML("views/frontend/mainView.php", array("hotproduct"=>$hotproduct,"newproduct"=>$newproduct));

		}
	}
?>