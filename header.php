<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="en" class="app">
 <head> 
  <meta charset="<?php $this->options->charset(); ?>">
  <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/OwO.min.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/animate.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/app.css'); ?>">
  
  <script src="<?php $this->options->themeUrl('js/OwO.min.js'); ?>"></script>

  <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

  <!-- 通过自有函数输出HTML头部信息 -->
  <?php $this->header(); ?>

 </head> 
 <body class="container"> 
  <section class="vbox"> 
   <header class="bg-white-only header header-md navbar navbar-fixed-top-xs"> 
   	<!-- Logo -->
    <div class="navbar-header aside bg-info"> 
     <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-navicon"></i> </a> 
     <a href="<?php $this->options->siteUrl(); ?>" class="navbar-brand text-lt"> <i class="fa fa-pagelines"></i> <span class="hidden-nav-xs m-l-sm"><?php $this->options->IndexName(); ?> </span> </a> 
    </div> 
    <!-- /Logo -->
    <!-- Mobile btn -->
    <ul class="nav navbar-nav hidden-xs"> 
     <li> <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted"> <i class="fa fa-indent text"></i> <i class="fa fa-dedent text-active"></i> </a> </li> 
    </ul> 
     <!-- /Mobile btn -->
    <!-- Search -->
    <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search"> 
     <div class="form-group"> 
      <div class="input-group"> 
       <span class="input-group-btn"> <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button> </span> 
       <input type="text" id="s" name="s" class="form-control input-sm no-border rounded" placeholder="<?php _e('输入关键字搜索'); ?>" required/> 
      </div> 
     </div> 
    </form> 
    <!-- /Search -->
    <div class="navbar-right "> 
	<!-- Begin -->
     <ul class="nav navbar-nav m-n hidden-xs"> 
     <!-- SuiuiNian -->
      <li class="hidden-xs"> <a href="javascrip:;" class="dropdown-toggle lt" data-toggle="dropdown"> <i class="fa fa-comments-o"></i></a> 
       <section class="dropdown-menu aside-xl animated fadeInUp"> 
        <section class="panel bg-white"> 
         <div class="panel-heading b-light bg-light"> 
          <strong><?php _e('朋友们的碎碎念'); ?></strong> 
          <a href="/Avatars.html" class="pull-right" title="查看更多"><i class="fa fa-share"></i></a> 
         </div> 
        <?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments); ?>
        <?php while($comments->next()): ?>
            <div class="list-group list-group-alt"> 
              <a href="<?php $comments->permalink(); ?>" class="media list-group-item"> 
              <span class="pull-left thumb-sm"> <?php $comments->gravatar('40', ''); ?> </span> 
              <span class="media-body block m-b-none"><?php $comments->author(false); ?><br /> 
                <small class="text-muted"><?php $comments->excerpt(50, '...'); ?></small> 
              </span> 
              </a> 
             </div> 
        <?php endwhile; ?>

        </section> 
       </section> 
       </li> 
       <!-- / SuiuiNian -->
       <li class="hidden-xs"> <a href="javascript:;" class="dropdown-toggle lt" data-toggle="dropdown"> <i class="fa fa-bell-o"></i></a> 
       <section class="dropdown-menu aside-xl animated fadeInUp"> 
        <section class="panel bg-white"> 
         <div class="panel-heading b-light bg-light"> 
          <strong><?php _e('时间他总是那么淘气'); ?></strong> 
          <a href="/TalkList.html" class="pull-right" title="查看更多"><i class="fa fa-share"></i></a> 
         </div> 
          <div class="list-group">
                <?php
                 //$comments->listComments(); 
                $slug = "talklist";    //页面缩略名，指的是.php页面的文件名这里是talk.php，所以他就是talk
                $limit = 4;    //调用数量
                $length = 140;    //截取长度
                $ispage = true;    //true 输出slug页面评论，false输出其它所有评论
                $isGuestbook = $ispage ? " = " : " <> ";
                 
                $db = $this->db;    //Typecho_Db::get();
                $options = $this->options;    //Typecho_Widget::widget('Widget_Options');
                 
                $page = $db->fetchRow($db->select()->from('table.contents')
                    ->where('table.contents.status = ?', 'publish')
                    ->where('table.contents.created < ?', $options->gmtTime)
                    ->where('table.contents.slug = ?', $slug));
                 
                if ($page) {
                    $type = $page['type'];
                    $routeExists = (NULL != Typecho_Router::get($type));
                    $page['pathinfo'] = $routeExists ? Typecho_Router::url($type, $page) : '#';
                    $page['permalink'] = Typecho_Common::url($page['pathinfo'], $options->index);
                 
                    $comments = $db->fetchAll($db->select()->from('table.comments')
                        ->where('table.comments.status = ?', 'approved')
                        ->where('table.comments.created < ?', $options->gmtTime)
                        ->where('table.comments.type = ?', 'comment')
                        ->where('table.comments.cid ' . $isGuestbook . ' ?', $page['cid'])
                        ->order('table.comments.created', Typecho_Db::SORT_DESC)
                        ->limit($limit));
                 
                    foreach ($comments AS $comment) {
                     echo '<a href="javascript:;" class="list-group-item"><span class="clear block m-b-none words_contents">'.$comment['text'].'<br><small class="text-muted">'.date('Y年n月j日 H:i:s',$comment['created']+($this->options->timezone - idate("Z"))).'</small></span></a>';
                    }
                } else {
                    echo '<a href="javascript:;" class="list-group-item"><span class="clear block m-b-none">这是一条默认的说说，如果你看到这条动态，请去后台新建独立页面，地址填写Talklist,自定义模板选择时光机。<br><small class="text-muted">'.date('Y年n月j日 H:i:s',time()+($this->options->timezone - idate("Z"))).'</small></span></a>';
                }?>
          </div>
        </section> 
       </section> 
       </li>
       <!-- Login -->
       <li class="hidden-xs"> <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle lt"> <i class="fa fa-user-o"></i> </a> 
       <section class="dropdown-menu aside animated fadeInUp panel-body bg-white dropdown-stop"> 
          <form role="form" action="<?php $this->options->loginaction(); ?>" method="post">
            <div class="form-group">
              <label>用户名</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="请输入用户名" required>
            </div>
            <div class="form-group">
              <label>密码</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="请输入密码" required>
            </div>
            <button type="submit" class="btn btn-group-justified btn-success">提交登录</button>
            <input type="hidden" name="referer" value="<?php $this->options->adminUrl(); ?>">
          </form>
       </section> 
       </li>
       <!-- / Login -->
     </ul> 
     <!-- / End -->
    </div> 
    <!-- / .navbar-right -->
   </header> 
   <!-- / .header End -->
   <section> 
    <section class="hbox stretch">