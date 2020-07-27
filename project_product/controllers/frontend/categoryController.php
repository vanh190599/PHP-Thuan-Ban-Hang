<?php  
	include "models/frontend/categoryModel.php";
	class categoryController extends Controller{
		use categoryModel;
		public function index(){
			$category = $this->model_listCategory();
			$this->renderHTML("views/frontend/categoryView.php",array("category"=>$category));
		}
	}
?>