<!--start including header-->
<?php
include('./mainInclude/header.php');

?>
<!--end including header-->
<!--start course page banner-->
<div class="container-fluid bg-dark">
	<div class="row">
		<img src="./images/main.jpg" alt="courses" style="height:500px; width: 100%; object-fit: cover; box-shadow: 10px;">
	</div>
</div>
<!--end course page banner-->
<!--start main content-->
<div style="text-align: center; margin-top: 50px;">
  <label for="order-id" style="font-size: 18px; font-weight: bold;">Order ID:</label>
  <input type="text" id="order-id" name="order-id" placeholder="Enter Order ID" style="margin-left: 10px; padding: 8px; width: 200px; border: 1px solid #ccc; border-radius: 4px;">
  <button type="button" style="margin-left: 10px; padding: 8px 12px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">View</button>
</div>
<!-- end main content-->
<!-- start contact us-->

	<?php
include('./contact.php');
?>

<!-- end contact us-->
<!-- start including footer-->
<div class="container-fluid" style="margin-top: 500px;">
<?php
include('./mainInclude/footer.php');
?>
</div>
<!-- end including footer-->
