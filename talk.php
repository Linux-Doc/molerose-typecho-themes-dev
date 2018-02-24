<?php 
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
 
<!--自定义评论代码结构-->
<div id="<?php $comments->theId(); ?>" class="comment-body wrapper-sm<?php 
if ($comments->_levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt('comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass; 
?>">
  <a class="thumb-sm pull-left m-r-sm">
    <?php $comments->gravatar('40', ''); ?>
  </a>
  <div class="m-l-lg clearfix">
      <strong class="m-b-xs"><?php $comments->author(); ?></strong>
      <small class="pull-right">
        <?php echo timesince($comments->created);?>
      </small>
      <small class="m-t-xs block"><?php $comments->content(); ?></small>
  </div>
</div>
<?php } ?>
<div id="comments">
  <!--如果允许评论，会出现评论框和个人信息的填写-->
  <?php if($this->allow('comment')): ?>

  <!--判断是否登录，只有登陆者才有权利发表说说-->
  <?php if($this->user->hasLogin()): ?>
  <!-- 输入框组 -->
  <div id="<?php $this->respondId(); ?>" class="wrapper-sm respond comment-respond" >
    <div class="panel panel-default m-t-md">
      <form id="comment_form" action="<?php $this->commentUrl() ?>" method="post" class="comment-form" role="form">
          <textarea id="comment" class="textarea form-control no-border OwO-textarea" name="text" rows="5" maxlength="65525" aria-required="true" required><?php $this->remember('text'); ?></textarea>
        <!--提交按钮-->
        <div class="panel-footer bg-light lter clearfix">
          <button type="submit" name="submit" id="submit" class="submit btn btn-info pull-right btn-xs">
            <span class="text">发表新鲜事</span>
          </button>
          <!-- 插入图片按钮 -->
          <a href="javascript:;" id="image-insert" style="width: 20px; display: inline-block; height: 20px;" ><i class="fa fa-file-image-o text-muted"></i></a>
          <span title="OwO" class="OwO"></span> 
        </div>
      </form>
    </div>
  </div>
  <?php else: ?>
  <!--如果没有登录则什么操作按钮都不会显示-->
  <?php endif; ?>

  <?php else: ?>
  <h4>此处评论已关闭</h4>
  <?php endif; ?>
  <?php $this->comments()->to($comments); ?>
  <?php if ($comments->have()): ?>
  <!-- 列表 -->
  <div class="blog-naughty">
      <h4 style="display: none;" class="comments-title m-t-lg m-b"><?php $this->commentsNum(_t(' 暂无评论'), _t(' 1 条评论'), _t(' %d 条评论')); ?></h4>
      <?php $comments->listComments(); ?>
  </div>
  <!-- 分页 -->
  <div class="text-center"> 
  <?php $comments->pageNav('«', '»', 3, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination pagination-sm', 'itemTag' => 'li', 'textTag' => 'a', 'currentClass' => 'active', 'prevClass' => '', 'nextClass' => '')); ?>
  </div> 
  <?php else: ?>

  <div class="blog-naughty">
    <ol class="comment-list"> 
      <div class="comment-body wrapper-sm comment-parent comment-odd comment-by-author">
        <a class="thumb-sm pull-left m-r-sm">
          <img class="avatar" src="<?php $this->options->BlogPic(); ?>">
        </a>
        <div class="m-l-lg clearfix">
          <strong class="m-b-xs"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->IndexName(); ?></a></strong>
            <small class="pull-right"><?php echo date('Y年m月d日 h时i分',time()+($this->options->timezone - idate("Z"))); ?></small>
            <small class="m-t-xs block"><p>在这里可以记录你的日常和心情。这是默认的一条说说，当发布第一条说说的时候，该条动态会自动消失。</p></small>
        </div>
      </div>
    </ol>
  </div>

  <?php endif; ?>
</div> 

<!-- OWO 表情 -->
<script>
var OwO_demo = new OwO({
    logo: 'OωO表情',
    container: document.getElementsByClassName('OwO')[0],
    target: document.getElementsByClassName('OwO-textarea')[0],
    api: '/usr/themes/molerose/js/OwO.min.json',
    position: 'down',
    width: '100%',
    maxHeight: '250px'
});
</script>