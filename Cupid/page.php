<?php

/**
 * Cupid - 为爱而来
 * @package     Typecho-Theme-Cupid
 * @author      Veen Zhao
 * @version     1.1
 * @link       https://blog.zwying.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

<!--页面主要内容-->
<div class="banner">
        <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('includes/footer.php'); ?>