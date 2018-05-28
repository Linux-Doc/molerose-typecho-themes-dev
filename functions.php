<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    // $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    // array('ShowRecentPosts' => _t('显示最新文章'),
    // 'ShowRecentComments' => _t('显示最近回复'),
    // 'ShowCategory' => _t('显示分类'),
    // 'ShowArchive' => _t('显示归档'),
    // 'ShowOther' => _t('显示其它杂项')),
    // array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    // $form->addInput($sidebarBlock->multiMode());
    /*<?php $this->options->socialqq(); ?> 调用方法*/

    //首页名称
    $IndexName = new Typecho_Widget_Helper_Form_Element_Text('IndexName', NULL, NULL, _t('首页的名称'), _t('输入你的首页显示的名称'));
    $form->addInput($IndexName);
    //博主名称
    $BlogName = new Typecho_Widget_Helper_Form_Element_Text('BlogName', NULL, NULL, _t('博主的名称'), _t('输入你的名称建议为英文，中文也可'));
    $form->addInput($BlogName);
    //博主头像
    $BlogPic = new Typecho_Widget_Helper_Form_Element_Text('BlogPic', NULL, NULL, _t('头像图片地址'), _t('logo头像地址，尺寸在80*80左右即可'));
    $form->addInput($BlogPic);
    //博主所在城市
    $BlogAdd = new Typecho_Widget_Helper_Form_Element_Text('BlogAdd', NULL, NULL, _t('博主所在城市'), _t('输入博主所在城市'));
    $form->addInput($BlogAdd);
    //博主职业
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
    //weiboUrl
    $socialweiboUrl = new Typecho_Widget_Helper_Form_Element_Text('socialweiboUrl', NULL, NULL, _t('输入微博主页链接'), _t('输入微博主页链接'));
    $form->addInput($socialweiboUrl);
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

//获取评论的锚点链接
function get_comment_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent,status')->from('table.comments')
        ->where('coid = ?', $coid));
    $parent = @$prow['parent'];
    if ($parent != "0") {//子评论
        $arow = $db->fetchRow($db->select('author,status')->from('table.comments')
            ->where('coid = ?', $parent));//查询该条评论的父评论的作者的名称
        @$author = @$arow['author'];//作者名称
        if(@$author && $arow['status'] == "approved"){//父评论作者存在且父评论已经审核通过
            if (@$prow['status'] == "waiting"){
                echo '<em class="awaiting">'."您的评论正等待审核！".'</em>';
            }
            echo '<a href="#comment-' . $parent . '"><div>@' . $author . '</div></a>';
        }else{//父评论作者不存在或者父评论没有审核通过
            if (@$prow['status'] == "waiting"){
                echo '<em class="awaiting">'."您的评论正等待审核！".'</em>';
            }else{
                echo '';
            }
        }
    } else {
        //母评论，无需输出锚点链接
        if (@$prow['status'] == "waiting"){
            echo '<em class="awaiting">'."您的评论正等待审核！".'</em>';
        }else{
            echo '';
        }
    }

}

//评论时间
function timesince($older_date,$comment_date = false) {
    $chunks = array(
    array(86400 , '天'),
    array(3600 , '小时'),
    array(60 , '分'),
    array(1 , '秒'),
    );
    $newer_date = time();
    $since = abs($newer_date - $older_date);

    for ($i = 0, $j = count($chunks); $i < $j; $i++){
    $seconds = $chunks[$i][0];
    $name = $chunks[$i][1];
    if (($count = floor($since / $seconds)) != 0) break;
    }
    $output = $count.$name.'前';
    return $output;
}

// 获取浏览器信息
function getBrowser($agent)
{
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $outputer = 'IE浏览器';
    } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
      $str1 = explode('Firefox/', $regs[0]);
$FireFox_vern = explode('.', $str1[1]);
        $outputer = '火狐浏览器 '. $FireFox_vern[0];
    } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
      $str1 = explode('Maxthon/', $agent);
$Maxthon_vern = explode('.', $str1[1]);
        $outputer = '傲游浏览器 '.$Maxthon_vern[0];
    } else if (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $agent, $regs)) {
        $outputer = '搜狗浏览器';
    } else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
$outputer = '360浏览器';
    } else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Edge/', $regs[0]);
$Edge_vern = explode('.', $str1[1]);
        $outputer = 'Edge '.$Edge_vern[0];
    } else if (preg_match('/UC/i', $agent)) {
              $str1 = explode('rowser/',  $agent);
$UCBrowser_vern = explode('.', $str1[1]);
        $outputer = 'UC浏览器 '.$UCBrowser_vern[0];
    } else if (preg_match('/MicroMesseng/i', $agent, $regs)) {
        $outputer = '微信内嵌浏览器';
    }  else if (preg_match('/WeiBo/i', $agent, $regs)) {
        $outputer = '微博内嵌浏览器';
    }  else if (preg_match('/QQ/i', $agent, $regs)||preg_match('/QQBrowser\/([^\s]+)/i', $agent, $regs)) {
                  $str1 = explode('rowser/',  $agent);
$QQ_vern = explode('.', $str1[1]);
        $outputer = 'QQ浏览器 '.$QQ_vern[0];
    } else if (preg_match('/BIDU/i', $agent, $regs)) {
        $outputer = '百度浏览器';
    } else if (preg_match('/LBBROWSER/i', $agent, $regs)) {
        $outputer = '猎豹浏览器';
    } else if (preg_match('/TheWorld/i', $agent, $regs)) {
        $outputer = '世界之窗浏览器';
    } else if (preg_match('/XiaoMi/i', $agent, $regs)) {
        $outputer = '小米浏览器';
    } else if (preg_match('/UBrowser/i', $agent, $regs)) {
              $str1 = explode('rowser/',  $agent);
$UCBrowser_vern = explode('.', $str1[1]);
        $outputer = 'UC浏览器 '.$UCBrowser_vern[0];
    } else if (preg_match('/mailapp/i', $agent, $regs)) {
        $outputer = 'email内嵌浏览器';
    } else if (preg_match('/2345Explorer/i', $agent, $regs)) {
        $outputer = '2345浏览器';
    } else if (preg_match('/Sleipnir/i', $agent, $regs)) {
        $outputer = '神马浏览器';
    } else if (preg_match('/YaBrowser/i', $agent, $regs)) {
        $outputer = 'Yandex浏览器';
    }  else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Opera浏览器';
    } else if (preg_match('/MZBrowser/i', $agent, $regs)) {
        $outputer = '魅族浏览器';
    } else if (preg_match('/VivoBrowser/i', $agent, $regs)) {
        $outputer = 'vivo浏览器';
    } else if (preg_match('/Quark/i', $agent, $regs)) {
        $outputer = '夸克浏览器';
    } else if (preg_match('/mixia/i', $agent, $regs)) {
        $outputer = '米侠浏览器';
    }else if (preg_match('/fusion/i', $agent, $regs)) {
        $outputer = '客户端';
    } else if (preg_match('/CoolMarket/i', $agent, $regs)) {
        $outputer = '基安内置浏览器';
    } else if (preg_match('/Thunder/i', $agent, $regs)) {
        $outputer = '迅雷内置浏览器';
    } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
$str1 = explode('Chrome/', $agent);
$chrome_vern = explode('.', $str1[1]);
        $outputer = 'Chrome '.$chrome_vern[0];
    } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
         $str1 = explode('Version/',  $agent);
$safari_vern = explode('.', $str1[1]);
        $outputer = 'Safari '.$safari_vern[0];
    } else{
        $outputer = '?浏览器';
    }
    echo $outputer;
}

// 获取操作系统信息
function getOs($agent)
{
    $os = false;
 
    if (preg_match('/win/i', $agent)) {
        if (preg_match('/nt 6.0/i', $agent)) {
            $os = '<i class="fa fa-windows"></i> Vista';
        } else if (preg_match('/nt 6.1/i', $agent)) {
            $os = '<i class="fa fa-windows"></i> 7';
        } else if (preg_match('/nt 6.2/i', $agent)) {
            $os = '<i class="fa fa-windows"></i> 8';
        } else if(preg_match('/nt 6.3/i', $agent)) {
            $os = '<i class="fa fa-windows"></i> 8.1';
        } else if(preg_match('/nt 5.1/i', $agent)) {
            $os = '<i class="fa fa-windows"></i> XP';
        } else if (preg_match('/nt 10.0/i', $agent)) {
            $os = '<i class="fa fa-windows"></i> 10';
        } else{
            $os = '<i class="fa fa-windows"></i>';
        }
    } else if (preg_match('/android/i', $agent)) {
    if (preg_match('/android 9/i', $agent)) {
            $os = '<i class="fa fa-android"></i> P';
        }
    else if (preg_match('/android 8/i', $agent)) {
            $os = '<i class="fa fa-android"></i> O';
        }
    else if (preg_match('/android 7/i', $agent)) {
            $os = '<i class="fa fa-android"></i> N';
        }
    else if (preg_match('/android 6/i', $agent)) {
            $os = '<i class="fa fa-android"></i> M';
        }
    else if (preg_match('/android 5/i', $agent)) {
            $os = '<i class="fa fa-android"></i> L';
        }
    else{
            $os = '<i class="fa fa-android"></i>';
    }
    }
    else if (preg_match('/ubuntu/i', $agent)) {
        $os = '<i class="fa fa-linux"></i>';
    } else if (preg_match('/linux/i', $agent)) {
        $os = '<i class="fa fa-linux"></i>';
    } else if (preg_match('/iPhone/i', $agent)) {
        $os = '<i class="fa fa-apple"></i>';
    } else if (preg_match('/mac/i', $agent)) {
        $os = '<i class="fa fa-apple"></i>';
    }else if (preg_match('/fusion/i', $agent)) {
        $os = '<i class="fa fa-android"></i>';
    } else {
        $os = '?系统';
    }
    echo $os;
}