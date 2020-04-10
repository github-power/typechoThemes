
<?php 
/**
 * Cupid - 为爱而来
 * @package     Typecho-Theme-Cupid
 * @author      Veen Zhao
 * @version     1.1
 * @link        https://blog.zwying.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->comments()->to($comments); ?>
<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
    <li id="li-<?php $comments->theId(); ?>" class=" comment-body<?php
                                                                    if ($comments->levels > 0) {
                                                                        echo ' comment-child';
                                                                        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
                                                                    } else {
                                                                        echo ' comment-parent';
                                                                    }
                                                                    $comments->alt(' comment-odd', ' comment-even');
                                                                    echo $commentClass;
                                                                    ?>">
        <div id="<?php $comments->theId(); ?>">
            <div class="container-fluid">
                <div class="comment-main">
                    <div class="row">
                        <div class="image col-6">
                        <img class="avatar" src="<?php isqq($comments->mail); ?>s=100" >
                            <div class="com-content">
                                <strong><?php $comments->author(); ?></strong>
                            </div>
                        </div>
                        <div class="col-6  ">
                            <small>
                                <div  class="float-right"  style="display: inline;"><?php $comments->date('Y-m-d H:i'); ?></div>
                            </small>
                            <!--  <span class="float-right  comment-reply"><?php $comments->reply(); ?></span> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 wenben" style="padding-top: 5px;">
                            <i class="qt-l"></i><?php $comments->content(); ?><i class="qt-r"></i>
                        </div>
                    </div>
                </div>
                <?php if ($comments->children) { ?>
                    <div class="comment-children">
                        <?php $comments->threadedComments($options); ?>
                    </div>
                <?php } ?>
            </div>
    </li>
<?php } ?>
<?php if ($this->allow('comment')) : ?>
    <div id="<?php $this->respondId(); ?>" class="respond list-content">
        <div class="list-top">
            <?php if ($comments->have()) : ?>
                <h5 class="container-fluid" style="clear:both;display:inline"><?php $this->commentsNum(_t('暂无祝福'), _t('仅有一条祝福'), _t('累计已经收到<span class="lover-days"> %d </span>条祝福')); ?></h5>
                <span onclick="javascript:location.href='#comment-form'" class="com-write">📝写一条</span>
                <?php $comments->listComments(); ?>
                <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
            <?php endif; ?>
            <form method="post" action="<?php $this->commentUrl() ?>" name="comment-form" id="comment-form" role="form" class="comment-form">
                <?php if ($this->user->hasLogin()) : ?>
                    <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                <?php else : ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="text" name="author" id="author" class="form-control" placeholder="<?php _e('姓名或昵称*'); ?>" value="<?php $this->remember('author'); ?>" required />
                        </div>
                        <div class="form-group col-md-4">
                            <input type="email" name="mail" id="mail" class="form-control" placeholder="<?php _e('邮箱*'); ?>" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> />
                        </div>
                        <div class="form-group col-md-4">
                            <input type="url" name="url" id="url" class="form-control" placeholder="<?php _e('网站或博客'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?> />
                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <textarea rows="3" cols="50" name="text" id="textarea" class="form-control" placeholder="<?php _e('写下对我们的祝福'); ?>" required><?php $this->remember('text'); ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="float-right btn btn-outline-danger"><?php _e('祝福发送'); ?></button>
                </div>
            </form>
        </div>
    </div>
<?php else : ?>
    <h3><?php _e('评论已关闭'); ?></h3>
<?php endif; ?>
