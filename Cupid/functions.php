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

<?php

require_once("libs/Utils.php");
require_once("libs/Contents.php");

/**
 * 注册文章解析 hook
 * 具体的解析代码需要在 Contents::parseContent() 方法中实现
 * 解析不会改变数据库中的内容，体现在文章前台输出、RSS 输出时
 */
Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('Contents','parseContent');
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('Contents','parseContent');


/**
 * 主题启用时执行的方法
 */
function themeInit($archive) {
    /**
     * 重置某些设置项，采用数据库查询方式完成
     */
    $db = Typecho_Db::get();
    
    /* 关闭评论反垃圾保护，使用 PJAX 时可能需要取消注释以下 4 行 */
    // $query = $db->update('table.options')->rows(array('value'=>'0'))->where('name=?', 'commentsAntiSpam');
    // $db->query($query);
    // $query = $db->update('table.options')->rows(array('value'=>'0'))->where('name=?', 'commentsCheckReferer');
    // $db->query($query);

    /* 设置评论最大嵌套层数 */
    $query = $db->update('table.options')->rows(array('value'=>'999'))->where('name=?', 'commentsMaxNestingLevels');
    $db->query($query);

    /* 强制新评论在前 */
    $query = $db->update('table.options')->rows(array('value'=>'DESC'))->where('name=?', 'commentsOrder');
    $db->query($query);

    /* 默认显示第一页评论 */
    $query = $db->update('table.options')->rows(array('value'=>'first'))->where('name=?', 'commentsPageDisplay');
    $db->query($query);
    if ($archive->is('category', 'lovelist')) {
		$archive->parameter->pageSize = 100; // 自定义条数
	}
}


/**
 * 主题后台设置
 */
function themeConfig($form) {
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('主题Favicon图标设置'), _t('在这里输入图标链接，不填则使用主题自带的Favicon'));
	$form->addInput($favicon);
    $lovetime = new Typecho_Widget_Helper_Form_Element_Text('lovetime', NULL, NULL, _t('恋爱起始日期设定') , _t('格式“YYYY-MM-DD”，例“2018-05-18”'));
    $form->addInput($lovetime);
    $boy = new Typecho_Widget_Helper_Form_Element_Text('boy', NULL, NULL, _t('男生头像设置') , _t('在这里输入头像链接'));
    $form->addInput($boy);
    $girl = new Typecho_Widget_Helper_Form_Element_Text('girl', NULL, NULL, _t('女生头像设置') , _t('在这里输入头像链接'));
    $form->addInput($girl);
    $boyname = new Typecho_Widget_Helper_Form_Element_Text('boyname', NULL, NULL, _t('男生昵称设置') , _t('在这里输入昵称'));
    $form->addInput($boyname);
    $girlname = new Typecho_Widget_Helper_Form_Element_Text('girlname', NULL, NULL, _t('女生昵称设置') , _t('在这里输入昵称'));
    $form->addInput($girlname);
    $blessing = new Typecho_Widget_Helper_Form_Element_Text('blessing', NULL, NULL, _t('祝福页面设置') , _t('在此输入祝福页面链接'));
    $form->addInput($blessing);
   $indcon = new Typecho_Widget_Helper_Form_Element_Text('indcon', NULL, NULL, _t('备案号设置') , _t('这里填写备案号'));
    $form->addInput($indcon);
    $midset = new Typecho_Widget_Helper_Form_Element_Text('midset', NULL, NULL, _t('双人头像设置') , _t('在此输入链接'));
    $form->addInput($midset);
    
}

/**
 * 文章与独立页自定义字段
 */
function themeFields(Typecho_Widget_Helper_Layout $layout) {
    $imgUrl = new Typecho_Widget_Helper_Form_Element_Text('imgUrl', NULL, NULL, _t('文章缩略图地址'), _t('在这里填入一个图片URL地址, 以在文章列表加上一张图片'));
    $layout->addItem($imgUrl);
    $onedes = new Typecho_Widget_Helper_Form_Element_Textarea('onedes', NULL, NULL, _t('一句话描述心情'), _t('100件事专用！！！100字以内最好'));
    $layout->addItem($onedes);
    $noorok = new Typecho_Widget_Helper_Form_Element_Text('noorok', NULL, NULL, _t('事件是否完成'), _t('100件事专用！！！完成请填写ok'));
    $layout->addItem($noorok);
}


/** 对邮箱类型判定，并调用QQ头像的实现 */
function isqq($email){
    if($email){
        if(strpos($email,"@qq.com") !==false){
            $email=str_replace('@qq.com','',$email);
            echo "//q1.qlogo.cn/g?b=qq&nk=".$email."&";
        }else{
            $email= md5($email);
            echo "//cdn.v2ex.com/gravatar/".$email."?";
        }
    }else{
    echo "//cdn.v2ex.com/gravatar/null?";
    }
}

