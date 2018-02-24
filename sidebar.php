<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
     <!-- .aside --> 
     <aside class="bg-dark aside hidden-print" id="nav"> 
      <section class="vbox"> 
       <section class="w-f-md scrollable"> 
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railopacity="0.2"> 
         <!-- nav --> 
         <nav class="nav-primary hidden-xs"> 
          <!-- author info -->
         <ul class="nav clearfix"> 
           <li> 
            <div class="text-center"> 
              <a href="/start-page.html" class="thumb-lg m-t"> <img src="<?php $this->options->BlogPic(); ?>" class="img-circle" /> </a> 
              <div class="m-t-sm m-b-sm l-h-2x"> 
              <small class="text-muted"><i class="fa fa-map-marker"></i> <?php $this->options->BlogAdd(); ?></small> 
              </div> 
            </div>
           </li> 
           <li>
            <div class="lt text-center clearfix">
            <div class="lt text-center clearfix">
              <!-- 时刻 -->
               <div class="wrapper">
                <div>
                  <?php 
                      $time= date("H",time()+($this->options->timezone - idate("Z")));
                      $percent= $time/24;
                      $percent= sprintf("%01.2f", $percent*100).'%';
                  ?> 
                  <?php if($time>=6 && $time<=11): ?>
                  <p><?php _e('新的一天要元气满满！'); ?></p>
                  <?php elseif($time>=12 && $time<=17): ?>
                  <p><?php _e('该不该叫个下午茶呢？'); ?></p>
                  <?php else : ?>
                       <p><?php _e('天黑了，回家吧！'); ?></p>
                  <?php endif; ?>
                  </div>
                  <div class="progress progress-xs m-b-none dker">
                    <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="<?php echo $percent; ?>" style="width: <?php echo $percent; ?>"></div>
                  </div>
              </div>
              <!-- end -->
               <p class="m-t-sm blog-nav-ico col-xs-12"> 
                <a href="<?php $this->options->socialgithub(); ?>" title="Github"  target="_blank" ><i class="fa fa-github"></i></a> 
                <a href="mailto:<?php $this->options->socialemail(); ?>" title="Email" ><i class="fa fa-envelope-o"></i></a>
                <a href="<?php $this->options->socialweiboUrl(); ?>" title="Sina Weibo" target="_blank" ><i class="fa fa-weibo"></i></a>
                <a href="<?php $this->options->commentsFeedUrl(); ?>" title="Comments RSS" target="_blank"><i class="fa fa-rss"></i></a>
                <a href="<?php $this->options->feedUrl(); ?>" title="Feed RSS" target="_blank"><i class="fa fa-rss-square"></i></a>
                <a href="<?php $this->options->analysis(); ?>" title="Statistics" target="_blank"><i class="fa fa-area-chart"></i></a>
               </p>
            </div>
           </li>
          </ul>
          <ul class="nav" data-ride="collapse"> 
           <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> <?php _e('Navigation'); ?> </li> 
           <li> <a href="<?php $this->options->siteUrl(); ?>" class="auto"> <span class="pull-right text-muted"> </span> <i class="fa fa-send-o"> </i> <span>Home Pages</span> </a> 
            </li> 
            <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> <?php _e('Composition'); ?> </li> 
           <li> <a href="javascript:;" class="auto"> <span class="pull-right text-muted"> <i class="fa fa-angle-left text"></i> <i class="fa fa-angle-down text-active"></i> </span> <i class="fa fa-lemon-o"> </i> <span> <?php _e('MoleRose'); ?> </span> </a> 
            <ul class="nav dk text-sm"> 
              <?php $this->widget('Widget_Metas_Category_List')
                   ->parse('<li><a href="{permalink}" class="auto"> <b class="badge bg-info pull-right">{count}</b> <i class="fa fa-angle-right text-xs"></i> <span>{name}</span> </a> </li>'); ?>
            </ul> </li> 
           <li> <a href="javascript:;" class="auto"> <span class="pull-right text-muted"> <i class="fa fa-angle-left text"></i> <i class="fa fa-angle-down text-active"></i> </span> <i class="fa fa-smile-o"> </i> <span> <?php _e('Pages'); ?> </span> </a> 
            <ul class="nav dk text-sm"> 
                  <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                      <li><a class="auto" <?php if($this->is('page', $pages->slug)): ?><?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><i class="fa fa-angle-right text-xs"></i><span><?php $pages->title(); ?></span></a></li>
                    <?php endwhile; ?>
            </ul> </li> 
          </ul> 
         </nav> 
         <!-- / nav --> 
        </div> 
       </section> 

       <footer class="footer hidden-xs no-padder text-center-nav-xs lt">
          <div class="bg hidden-xs text-center">
            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
               <div class="col-xs-4 blog-stats m-t-xs"> 
                 <span class="block text-white"><?php $stat->publishedPostsNum() ?></span> 
                 <small class="text-muted">Article</small> 
               </div>
               <div class="col-xs-4 blog-stats m-t-xs"> 
                 <span class="block text-white"><?php $stat->categoriesNum() ?></span> 
                 <small class="text-muted">Sort</small> 
               </div>
               <div class="col-xs-4 blog-stats m-t-xs"> 
                 <span class="block text-white"><?php $stat->publishedCommentsNum() ?></span> 
                 <small class="text-muted">Comment</small> 
               </div> 
          </div>
        </footer>
        

      </section> 
     </aside> 
     <!-- /.aside -->