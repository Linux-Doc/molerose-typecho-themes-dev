
## 页面说明（预计需要使用的页面）

| 页面 | 页面说明 | 类型 |
| ---- | -------- | ---- |
| index.php | 首页 | 系统自带 |
| archive.php | 分类/搜索/作者/标签公用页面 | 系统自带 |
| post.php | 文章详细页 | 系统自带 |
| comments.php | 留言页面 | 系统自带 |
| page.php | 单一页面 | 系统自带 |
| 404.php | 404页面 | 系统自带 |
| footer.php | 脚部 | 系统自带 |
| header.php | 头部 | 系统自带 |
| sidebar.php | 侧边栏目 | 系统自带 |
| functions.php | 功能存放 | 系统自带 |
| avatars.php | 留言墙 | 新增 |
| links.php | 友情链接 | 新增 |
| file.php | 归档页面 | 新增 |

## 功能
| 功能 | 时间 |
| ---- | ---- |
| 留言板 | 20171215 |
| 友情链接 | 20171215 |
| 前台登录 | 20171215 |
| 留言同步邮箱 | 20171215 |
| 侧边栏文章调用 | 20171215 |
| 网站运行时间 | 20171215 |
| 赞赏 | 20171215 |

## 插件使用
| 名称 |
| ---- |
| Avatars （留言墙） |
| Links （友情链接）|
| CodeStyle （代码高亮） |
| CommentToMail （留言同步邮箱） |
| Sticky （文章置顶） |
| Thumbnail （文章缩略图） |
| TePostViews （浏览统计和热门文章调用） |

## 使用注意事项

- 初次使用模板注意，因为模板中附带有插件，页面上也是写了对应的插件输出代码的，所以，初次使用的时候，一定要先开启插件，否则会报 `Server 500` 的错误，后期自动化这一块而会修正与集合。

- 博客实现前台登录

```PHP
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
```

- 统计整站数据

```PHP
<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
文章总数：<?php $stat->publishedPostsNum() ?>篇
分类总数：<?php $stat->categoriesNum() ?>个
评论总数：<?php $stat->publishedCommentsNum() ?>条
页面总数：<?php $stat->publishedPagesNum() ?>个
```

- 针对 `Links` 插件，不论使用typecho1.0还是typecho1.1 均需要修改原始模板的一个东西（修改的原因是因为插件本导致文件被重复 `require` 了）
- 目录：`/admin/common.php`
- 内容：第6行的 `define('__TYPECHO_ADMIN__', true);` 换成如下代码

``` PHP
if (!defined('__TYPECHO_ADMIN__')) {
        define('__TYPECHO_ADMIN__', true);
}
```

- 针对 `Avatars` 插件，如果使用 typecho1.1 的话存存在一个插件不能使用，原因是因为插件中限定了版本号 `@dependence` ，去掉即可

## 笔记

- 后台增加社会化链接填写功能，加在 `function.php` 文件 `function themeConfig($form) { }` 方法内部即可！ 

``` PHP
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
```

- 侧边栏标签集合调用

```PHP
<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=28')->to($tags); ?>
<?php while($tags->next()): ?>
    <a href="<?php $tags->permalink(); ?>" class="label bg-primary"><?php $tags->name(); ?></a>
<?php endwhile; ?>

// class="size-<?php $tags->split(5, 10, 20, 30); ?>" 
// a 元素的类名，中如果加上以上的代码的话，可以实现文字 `size` 随机大小
```

- 首页，调用除开博主的留言列表

``` PHP
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
```

- 自定义留言样式

``` PHP
<?php function threadedComments($comments, $options) {
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
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">

    <div class="comment-txt-box" id="<?php $comments->theId(); ?>">
        <div class="comment-author clearfix">
            <?php $comments->gravatar('40', ''); ?>
            <cite class="fn comment-info-title"><?php $comments->author(); ?></cite>
            <a href="<?php $comments->permalink(); ?>" class="comment-meta" ><?php $comments->date('F jS, Y \a\t h:i a'); ?></a>
        </div>

        <?php $comments->content(); ?>

        <?php if ('waiting' == $comments->status) { ?>  
        <em class="awaiting"><?php $options->commentStatus(); ?></em>  
        <?php } ?>
        <!-- 评论审核，waiting 后全等的对象，对应 threadedComments 的第一，二个对象 -->
        <div class="comment-meta">
            <span class="comment-reply label bg-info"><?php $comments->reply(); ?></span>
        </div>
    </div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
        
    </div>
<?php } ?>
</li>
<?php } ?>


//$this 对应整个评论自定义函数(threadedComments)第一个变量，如这里是 $comments
<?php if ('waiting' == $this->status) { ?>  
//$singleCommentOptions 对应函数(threadedComments)的第二个变量，如这里是 $options
<em class="awaiting"><?php $singleCommentOptions->commentStatus(); ?></em>  
<?php } ?>

```

- 输出/嵌入页面

``` PHP
<?php $this->need('comments.php'); ?>
```

- 单独输出文章分类

``` PHP
<?php $this->widget('Widget_Metas_Category_List') ->parse('<li class="list-group-item"> <a href="{permalink}"> <span class="badge pull-right">{count}</span> {name} </a> </li>'); ?>
```

- 单独输出单页列表

``` PHP
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
  <li><a class="auto" <?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><i class="fa fa-angle-right text-xs"></i><span><?php $pages->title(); ?></span></a></li>
<?php endwhile; ?>
```

- 单独输出文字内容

``` PHP
<?php _e('MoleRose'); ?>
```

- 文章上下翻页自定义

``` PHP
// 存放到 function.php 文件中的

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
echo $link;  // 自定义样式
} else {
$link = '<li class="previous disabled"><a href="javascript:;" data-toggle="article-tooltip" data-placement="right" title="没有了，亲！">上一篇</a></li>';
echo $link; // 自定义样式，没有链接时候的不可点击样式
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
echo $link; // 自定义样式
} else {
$link = '<li class="next disabled"><a href="javascript:;" data-toggle="article-tooltip" data-placement="left" title="没有了，亲！">下一篇</a></li>';
echo $link; // 自定义样式，没有链接时候的不可点击样式
}
}

// 输出语法
// 上一篇
<?php thePrev($this); ?> 
// 下一篇
<?php theNext($this); ?>

```

- 非VPS下（如，虚拟主机...）配置文件中，数据库索引书写如下，修改 `user`，`password`，以及 `database`

``` PHP
/** 定义数据库参数 */
$db = new Typecho_Db('Mysql', 'typecho_');
$db->addServer(array (
  'host' => 'localhost',
  'user' => 'root',
  'password' => '123456',
  'charset' => 'utf8',
  'port' => '3306',
  'database' => 'root',
), Typecho_Db::READ | Typecho_Db::WRITE);
Typecho_Db::set($db);
```