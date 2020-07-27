<?php 
	//include file searchModel de su dung class searchModel
	include "models/frontend/searchModel.php";
	class searchController extends Controller{
		//su dung class searchModel
		use searchModel;
		public function index(){
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			
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
			//goi ham model_get() trong class searchModel de lay du lieu
			$data = $this->model_get($fromRecord,$recordPerPage);
			$this->renderHTML("views/frontend/searchView.php", array("data"=>$data,"numPage"=>$numPage,"key"=>$key));
		}
	}
 ?>