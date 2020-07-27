<?php
	//lấy file layout_trangtrong.php vào đây
	$this->layout = ("views/frontend/layout_trangtrong.php");
?>
<div class="template-cart">
	<form action="index.php?controller=cart&action=update" method="post">
		<div class="table-responsive">
			<table class="table table-cart">
				<thead>
					<tr>
						<th class="image">Ảnh sản phẩm</th>
						<th class="name">Tên sản phẩm</th>
						<th class="price">Giá bán lẻ</th>
						<th class="quantity">Số lượng</th>
						<th class="price">Thành tiền</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($_SESSION["cart"])): ?>
					<?php foreach($_SESSION["cart"] as $product): ?>
					<tr>
						<td><img src="assets/upload/product/<?php echo $product["img"]; ?>" class="img-responsive" /></td>
						<td><a href="index.php?controller=product&action=detail&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></td>
						<td> <?php echo number_format($product["price"]); ?>₫ </td>
						<td><input type="number" id="qty" min="1" class="input-control" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["id"]; ?>" required="Không thể để trống"></td>
						<td><p><b><?php echo number_format($product["number"]*$product["price"]); ?>₫</b></p></td>
						<td><a href="index.php?controller=cart&action=delete&id=<?php echo $product["id"]; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
					</tr>
					<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
				<tfoot>
				<tr>
					<td colspan="6"><a href="index.php?controller=cart&action=destroy" class="button pull-left">Xóa toàn bộ</a> <a href="index.php" class="button pull-right black">Tiếp tục mua hàng</a>
					<input type="submit" class="button pull-right" value="Cập nhật"></td>
				</tr>
				</tfoot>
			</table>
		</div>
	</form>
	<?php if($this->cart_number() > 0): ?>
	<!-- gọi hàm cart_total() trong cartModel -->
	<div class="total-cart"> Tổng tiền thanh toán:
		<?php echo number_format($this->cart_total()); ?>đ<br>
		<a href="index.php?controller=checkout" class="button black">Thanh toán</a> </div>
	<?php endif; ?>
	</div>