<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <html lang="<?= Yii::$app->language ?>">
<html lang="en">

     <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Админка |<?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <title>Polaroid Photography Category Bootstrap Responsive website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Polaroid Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <!-- //online-fonts -->

</head>
<body>
    <?php $this->beginBody() ?>
    <div class="sidenav">
		<div class="row side_top">
		<div class="col-4 side_top_left">
			<img src="images/kolpac.jpg" alt="news image" class="img-fluid navimg">
		</div>
		<div class="col-8 side_top_right">
			<h6>Steve Waugh </h6>
			<p>Photographer</p>
		</div>
		</div>
       <header>
			<div class="container-fluid px-md-5 ">
				<nav class="mnu mx-auto">
                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop">
						<ul class="menu">
							<li class="active"><a href="<?= Url::home()?>" class="scroll">Home</a></li>
							
							 <li class="mt-sm-3"><a href="<?= Url::to('/admin/users/orders') ?>" class="scroll">Список заказов на сегодня:<?=date('Y-m-d')?></a></li>
				
							  <li class="mt-sm-3"><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['name']?> (Выход)</a></li>
						
							
                        </ul>
				</nav>
			</div>
		</header>
    </div>
    <div class="main" id="home">
  <!--      <div class="banner-text-w3ls">
            <div class="container">
                <div class="mx-auto text-center">
                    <h1>Nibh eleifend nulla nascetur pharetra
	<br>commodo mi augue interdum tellus.</h1>
					<p class="banp mx-auto mt-3">Nulla pellentesque mi non laoreet eleifend. Integer porttitor mollisar lorem, at molestie arcu  </p>
					<a class="btn btn-primary mt-lg-5 mt-3 agile-link-bnr" href="#about" role="button">Learn More</a>
                </div>
            </div>
        </div>-->

 <!--services-->

 <div class="container dishfont">   <!-- //services-->
     <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif;?>
<?= $content?>
	</div>
 </div>

<!-- contact -->
	 
	 <!-- //contact -->

    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>