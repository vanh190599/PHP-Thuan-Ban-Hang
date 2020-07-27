<?php 
	//include file productModel de su dung class productModel
	include "models/frontend/productModel.php";
	class productController extends Controller{
		//su dung class productModel
		use productModel;
		public function category(){
			$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"]:0;
			//lấy tên danh mục sản phẩm
			$categoryName = $this->getCategoryName(); //hàm này trong class productModel
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 15;
			//----
			//phan trang	
			//tinh tong so ban ghi
			$total = $this->model_total();			
			//tinh tong so trang
			$numPage = ceil($total/$recordPerPage);//ham ceil de lay tran
			//lay bien p truyen tu url -> bien nay the hien la dang o may
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])? $_GET["p"]-1:0;
			$fromRecord = $p*$recordPerPage;			
			//----
			//goi ham model_get() trong class productModel de lay du lieu
			$data = $this->model_get($fromRecord,$recordPerPage);
			$this->renderHTML("views/frontend/productCategoryView.php", array("data"=>$data,"numPage"=>$numPage,"id"=>$id));
		}
		//chi tiết sản phẩm
		public function detail(){
			$record = $this->model_detail();
			$this->renderHTML("views/frontend/productDetailView.php",array("record"=>$record));
		}
	}
 ?>