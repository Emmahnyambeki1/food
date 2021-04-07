<?php include('partials/menu.php'); ?>

<!--main content-->
<?php
if(isset($_GET['message']))
{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Alert! </strong> '.base64_decode($_GET['message']).'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
}

?>
<div></div>

<div class="main-content">
	<div class="wrapper">
		
<h1>DASHBOARD</h1>>

<div class="col-4 text-center">
	<h1>5</h1>
	<br />
	Categories
	



</div>
<div class="col-4 text-center">
	<h1>5</h1>
	<br />
	Categories
	



</div>
<div class="col-4 text-center">
	<h1>5</h1>
	<br />
	Categories
	



</div>
<div class="col-4 text-center">
	<h1>5</h1>
	<br />
	Categories
	



</div>
<div class="clearfix">
	
</div>
	</div>



<!--footer-->

<?php include('partials/footer.php'); ?>
</body>
</html>