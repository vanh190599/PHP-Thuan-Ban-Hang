<?php  
	include "models/frontend/checkoutModel.php";
	class checkoutController extends Controller{
		use checkoutModel;
		public function index(){
			$this->renderHTML("views/frontend/checkoutView.php");
		}
		public function bill(){
			//gọi hàm model_bill trong checkoutModel
			$this->model_bill();
			//quay trở lại trang dọn hàng
			header("location:index.php?controller=cart");
		}
	}
?>