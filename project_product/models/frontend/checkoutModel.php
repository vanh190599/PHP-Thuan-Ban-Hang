<?php  
	trait checkoutModel{
		public function model_bill(){
			$fullname = $_POST["fulname"];
			$email = $_POST["email"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			//---
			$conn = Connection::getInstance();
			//---
			//insert bản ghi vào tbl_customer, lấy customer_id vừa mới insert
			$query = $conn->prepare("insert into tbl_customer set fullname=:fullname, email=:email, address=:address, phone=:phone");
			$query->execute(array("fullname"=>$fullname,"email"=>$email,"address"=>$address,"phone"=>$phone));
			//lấy id vừa mới insert
			$customer_id = $conn->lastInsertId();
			//---
			//---
			//insert bản ghi vào tbl_order, lấy order_id vừa mới insert 
			$query = $conn->prepare("insert into tbl_order set customer_id=:customer_id, create_at=now()");
			$query->execute(array("customer_id"=>$customer_id));
			//lấy id vừa mới insert
			$order_id = $conn->lastInsertId();
			//duyệt các bản ghi trong session array để insert vào tbl_order_detail
			foreach($_SESSION["cart"] as $product){
				$query = $conn->prepare("insert into tbl_order_detail set order_id=:order_id, product_id=:product_id, price=:price, number=:number");
				$query->execute(array("order_id"=>$order_id,"product_id"=>$product["id"],"price"=>$$product["price"],"number"=>$$product["number"]));
			}
			//xóa giỏ hàng
			unset($_SESSION["cart"]);
		}
	}
?>