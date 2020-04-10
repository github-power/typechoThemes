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
$this->need('includes/header.php');
?>

<div class="list-content">
    <div class="list-top">
        <h3 class="list-text" style="letter-spacing: 2px">💕<?php $this->title() ?>💕</h3>
        <div class="accordion" id="accordionExample">
            <div class="post-content wysiwyg" style="line-height: 2em;" itemprop="articleBody">
                <?php $this->content(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->need('includes/footer.php'); ?>