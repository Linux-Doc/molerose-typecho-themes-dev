<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());

    //博主职业
    /*<?php $this->options->socialqq(); ?> 调用方法*/
    $BlogJob = new Typecho_Widget_Helper_Form_Element_Text('BlogJob', NULL, NULL, _t('博主的介绍'), _t('输入你的简介'));
    $form->addInput($BlogJob);
    //首页文字
    $Indexwords = new Typecho_Widget_Helper_Form_Element_Text('Indexwords', NULL, NULL, _t('首页一行文字介绍'), _t('输入你喜欢的一行文字吧，在首页博客名称下面显示'));
    $form->addInput($Indexwords);
    //twitter
    $socialtwitter = new Typecho_Widget_Helper_Form_Element_Text('socialtwitter', NULL, NULL, _t('输入twitter链接'), _t('在这里输入twitter链接,带http:// 为空则不显示按钮'));
    $form->addInput($socialtwitter);
    //facebook
    $socialfacebook = new Typecho_Widget_Helper_Form_Element_Text('socialfacebook', NULL, NULL, _t('输入facebook链接'), _t('在这里输入facebook链接,带http://，为空则不显示按钮'));
    $form->addInput($socialfacebook);
    //google+
    $socialgooglepluse = new Typecho_Widget_Helper_Form_Element_Text('socialgooglepluse', NULL, NULL, _t('输入google+链接'), _t('在这里输入google+链接,带http://，为空则不显示按钮'));
    $form->addInput($socialgooglepluse);
    //github
    $socialgithub = new Typecho_Widget_Helper_Form_Element_Text('socialgithub', NULL, NULL, _t('输入github链接'), _t('在这里输入github链接,带http://，为空则不显示按钮'));
    $form->addInput($socialgithub);
    //email
    $socialemail = new Typecho_Widget_Helper_Form_Element_Text('socialemail', NULL, NULL, _t('输入email地址'), _t('在这里输入email地址'));
    $form->addInput($socialemail);
    //QQ
    $socialqq = new Typecho_Widget_Helper_Form_Element_Text('socialqq', NULL, NULL, _t('输入QQ号码'), _t('在这里输入QQ号码'));
    $form->addInput($socialqq);
    //weibo
    $socialweibo = new Typecho_Widget_Helper_Form_Element_Text('socialweibo', NULL, NULL, _t('输入微博ID'), _t('在这里输入微博名称'));
    $form->addInput($socialweibo);
    //网易云音乐
    $socialmusic = new Typecho_Widget_Helper_Form_Element_Text('socialmusic', NULL, NULL, _t('输入网易云音乐ID'), _t('在这里输入网易云音乐ID'));
    $form->addInput($socialmusic);
    //时光机中关于我的内容
    $about = new Typecho_Widget_Helper_Form_Element_Textarea('about', NULL, NULL, _t('输入关于我的内容'), _t('输入关于我的内容'));
    $form->addInput($about);
    //网站统计代码
    $analysis = new Typecho_Widget_Helper_Form_Element_Textarea('analysis', NULL, NULL, _t('网站统计代码'), _t('填入第三方统计代码.<span style="color: #f00">提示：</span><span><b>推荐使用google analysis、百度统计</b>，由于ajax，CNZZ代码用户请使用样例代码的第一种，而且“统计代码”字样会随着页面加载消失，望了解。</span>(不推荐cnzz，因为cnzz代码使用document.wirte创建“站长统计”字样不安全，而且cnzz界面不好看~)'));
    $form->addInput($analysis);
    //favicon图标
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('favicon 地址'), _t('填入博客 favicon 的地址, 不填则显示主机根目录下的favicon.ico文件'));
    $form->addInput($favicon);
    //首页标题后缀
    $titleintro = new Typecho_Widget_Helper_Form_Element_Text('titleintro', NULL, NULL, _t('首页标题后缀'), _t('你的博客标题栏博客名称后面的副标题'));
    $form->addInput($titleintro);

}


/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

/**
* 上一篇
*
* @access public
* @param string $default 如果没有上一篇,显示的默认文字
* @return void
*/
function theNext($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created > ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_ASC)
->limit(1);
$content = $db->fetchRow($sql);

if ($content) {
$content = $widget->filter($content);
$link = '<li class="previous"> <a href="' . $content['permalink'] . '" title="' . $content['title'] . '" data-toggle="article-tooltip" data-placement="right"> 上一篇 </a></li>
';
echo $link;
} else {
$link = '<li class="previous disabled"><a href="javascript:;" data-toggle="article-tooltip" data-placement="right" title="没有了，亲！">上一篇</a></li>';
echo $link;
}
}
 
/**
* 下一篇
*
* @access public
* @param string $default 如果没有下一篇,显示的默认文字
* @return void
*/
function thePrev($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created < ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_DESC)
->limit(1);
$content = $db->fetchRow($sql);
 
if ($content) {
$content = $widget->filter($content);
$link = '<li class="next"> <a href="' . $content['permalink'] . '" title="' . $content['title'] . '" data-toggle="article-tooltip" data-placement="left"> 下一篇 </a></li>';
echo $link;
} else {
$link = '<li class="next disabled"><a href="javascript:;" data-toggle="article-tooltip" data-placement="left" title="没有了，亲！">下一篇</a></li>';
echo $link;
}
}
              