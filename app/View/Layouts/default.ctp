<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Cashtool</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<?=$this->element('Blocks/header');?>

<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">

<?=$this->element('Blocks/sidebar');?>

<!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">
  <?=$this->element('Blocks/breadcrumb');?>	
  <?=$this->fetch('content'); ?>
  </div>
<?=$this->element('Blocks/footer');?>
</body>
</html>