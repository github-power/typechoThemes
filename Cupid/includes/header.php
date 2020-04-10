<?php

/**
 * Cupid - 为爱而来
 * @package     Typecho-Theme-Cupid
 * @author      Veen Zhao
 * @version     1.1
 * @link        https://blog.zwying.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<a class="btn btn-default" href="<?php Helper::options()->siteUrl()?>" role="button" style="position:fixed;right:0;top:0;z-index: 100;">返回首页</a>
<div class="top container-fluid">
    <div class="list-logodiv">
        <div class="row align-items-center">
            <div class="col-5">
                <div class=" ml-auto" style="text-align:center">
                    <div class="list-lover" style="background-image: url(<?php $this->options->boy(); ?>);"></div>
                    <p class="lover-txt"><?php $this->options->boyname(); ?></p>
                </div>
            </div>
            <div class="col-2 text-center">
                <img class="list-icon-heart" src="<?php Utils::indexTheme('assets/img/love.png'); ?>" />
            </div>
            <div class="col-5 ">
                <div class="  mr-auto" style="text-align:center">
                    <div class="list-lover" style="background-image: url(<?php $this->options->girl(); ?>);"></div>
                    <p class="lover-txt"><?php $this->options->girlname(); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>