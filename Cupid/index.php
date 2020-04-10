<body>
<?php

/**
 * Cupid - 为爱而来
 * @package     Typecho-Theme-Cupid
 * @author      Veen Zhao
 * @version     1.1
 * @link        https://blog.zwying.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
/*$this->need('includes/header.php');*/
?>
<div class="top container-fluid">
    <div class=" logodiv">
        <div class="row align-items-center">
            <div class="col-5">
                <div class=" ml-auto" style="text-align:center">
                    <div class="lover" style="background-image: url(<?php $this->options->boy(); ?>);"></div>
                    <p class="lover-txt"><?php $this->options->boyname(); ?></p>
                </div>
            </div>
            <div class="col-2 text-center">
                <img class="icon-heart" src="<?php Utils::indexTheme('assets/img/love.png'); ?>" />
            </div>
            <div class="col-5 ">
                <div class="  mr-auto" style="text-align:center">
                    <div class="lover" style="background-image: url(<?php $this->options->girl(); ?>);"></div>
                    <p class="lover-txt"><?php $this->options->girlname(); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class=" container">
        <div class="row">
            <div class="col-lg-8 col-md-12 contl">
                <div class="contop">
                    <img class="iconimg" src="<?php $this->options->midset(); ?>">
                    <h5>💘这个小破站将会记录我们的<a style="color:tomato" href="index.php/category/dddd/">点点滴滴</a>💘</h5>
                    <h6>📝这份<a style="color:tomato" href="index.php/category/lovelist/">【恋爱清单】</a>，记录我们的甜蜜时刻</h6>
                    <h6>🦄相信我们还会留下更多美好的回忆，谢谢大家的<a style="color:tomato" href="<?php $this->options->blessing(); ?>">【祝福】</a></h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 contr">
                <div class="condown text-center">
                    <h5>我们风雨同舟已经走过</h5>
                    <div id="site_runtime"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->need('includes/footer.php'); ?>
</body>