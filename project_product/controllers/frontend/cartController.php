<?php  
	include "models/frontend/cartModel.php";
	class cartController extends Controller{
		use cartModel;
		//hàm tạo sử dụng để kiểm tra và khởi tạo giá trị
		public function __construct(){
			//nếu session cart chưa tồn tịa thì khởi tạo nó
			if(!isset($_SESSION["cart"]))
				$_SESSION["cart"] = array();
		}
		//hàm thêm mới sản phẩm vào giỏ hàng
		public function add(){
			//gọi hàm add từ model
			$this->cart_add();
			//quay trở lại trang giỏ hàng
			header("location:index.php?controller=cart");
		}
		//hiển thị giở hàng
		public function index(){
			$this->renderHTML("views/frontend/cartView.php");
		}
		//xáo phần tử khỏi giở hàng
		public function delete(){
			$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"]:0;
			//gọi hàm cart_delete từ cartModel
			$this->cart_delete($id);
			//quay trở lại trang giỏ hàng
			header("location:index.php?controller=cart");
		}
		//xóa toàn bộ giở hàng
		public function destroy(){
			$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"]:0;
			//gọi hàm cart_delete từ cartModel
			$this->cart_destroy();
			//quay trở lại trang giỏ hàng
			header("location:index.php?controller=cart");
		}
		//cập nhật số lượng sản phẩm
		public function update(){
			//duyệt các phần tử trong session array
			foreach($_SESSION["cart"] as $product){
				$quantity = "product_".$product["id"];
				$number = $_POST[$quantity];
				//gọi hàm cart_update từ cartModel
				$this->cart_update($product["id"], $number);
			}		
			//quay trở lại trang giỏ hàng
			header("location:index.php?controller=cart");
		}
	}
?>