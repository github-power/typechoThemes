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
<?php if ($this->category == "lovelist") : ?>
    <!-- lovelist专属样式 -->
    <div class="list-content">
        <div class="list-top">
            <h5 class="list-text">💕世间最动情之事，莫过于两人相依💑，走过四季三餐的温暖。<br>📜一百件事记录着我们的点点滴滴，你一百种样子💃，我一百种喜欢。</h5>
            <div class="accordion" id="accordionExample">
                <?php $i = 1; ?>
                <?php while ($this->next()) : ?>
                    <div class="list-bak ">
                        <div id="heading-<?php echo $i; ?>">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $i; ?>">
                                    <div class="list-wenben">
                                        <img class="wcicon" src="<?php
                                                                    if (($this->fields->noorok) == "ok") {
                                                                        echo Utils::indexTheme('assets/img/wc.png');
                                                                    } else {
                                                                        echo Utils::indexTheme('assets/img/wwc.png');
                                                                    }
                                                                    ?>">
                                        <span class="list-wbc" id="list-wbc"><?php $this->title() ?></span>
                                        <span class="list-num"><?php echo $i; ?></span>
                                    </div>
                                </button>
                            </h2>
                        </div>
                        <div id="collapse-<?php echo $i; ?>" class="collapse" aria-labelledby="heading-<?php echo $i; ?>" data-parent="#accordionExample">
                            <div class="list-body card-body">
                                <span class="list-img" style="background-image:url(<?php $this->fields->imgUrl(); ?>);"></span>
                                <p><?php $this->fields->onedes(); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<!--  <ul class="post-meta">
                        <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
                        <li><?php _e('时间: '); ?></li>
                        <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
                        <li itemprop="interactionCount"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
                    </ul> -->
                    <!-- <div class="post-content" itemprop="articleBody">
                    <?php $this->content('- 阅读剩余部分 -'); ?>
                    </div> -->
    <!-- 点点滴滴专属样式 -->
<?php elseif ($this->category == "dddd") : ?>
    <div class="list-content">
        <div class="list-top">
        <h5 class="list-text">💕世间最动情之事，莫过于两人相依💑，走过四季三餐的温暖。<br>📜相信在以后会有更多美好的事情发生😊</h5>
        <div class="accordion" id="accordionExample">
        <?php if ($this->have()) : ?>
            <?php while ($this->next()) : ?>
                
                <article style="padding: 20px;border-bottom: 1px solid rgba(0,123,255,.2);text-align: center;" class="post" itemscope itemtype="http://schema.org/BlogPosting">
                    <h4 class="post-title" itemprop="name headline"><a class=" list-wbc" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h4>
                    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished">  深情地写于 <?php $this->date(); ?></time>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>
        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
        </div>
        </div>
    </div>
<?php else : ?>
    <!-- 默认分类样式 -->
    <div class="col-mb-12 col-8" id="main" role="main">
        <h3 class="archive-title"><?php $this->archiveTitle(array(
                                        'category'  =>  _t('分类 %s 下的文章'),
                                        'search'    =>  _t('包含关键字 %s 的文章'),
                                        'tag'       =>  _t('标签 %s 下的文章'),
                                        'author'    =>  _t('%s 发布的文章')
                                    ), '', ''); ?></h3>
        <?php if ($this->have()) : ?>
            <?php while ($this->next()) : ?>
                <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                    <h2 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                    <ul class="post-meta">
                        <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
                        <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
                        <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
                        <li itemprop="interactionCount"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
                    </ul>
                    <div class="post-content" itemprop="articleBody">
                        <?php $this->content('- 阅读剩余部分 -'); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>
        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div>
<?php endif; ?>
<?php $this->need('includes/footer.php'); ?>