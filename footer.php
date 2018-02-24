<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

    </section> <!-- / .hbox -->
   </section> 
  </section> <!-- / .vbox -->


  <script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
  <script src="<?php $this->options->themeUrl('js/bootstrap.js'); ?>"></script>
  <script src="<?php $this->options->themeUrl('js/app.js'); ?>"></script>
  <script src="<?php $this->options->themeUrl('js/jquery.slimscroll.min.js'); ?>"></script>
  <script src="<?php $this->options->themeUrl('js/app.plugin.js'); ?>"></script>
  <script>
  var _hmt = _hmt || [];
  (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?2931b314f9d3d661167ff86b21ad9005";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
  })();
  </script>
  <script>
    $('.dropdown-stop').click(function(e) {
        e.stopPropagation();
    });
  </script>
  <script>
    $(document).ready(function(){
      var comment_html = document.getElementById("comment");
      $('#image-insert').bind("click",function(){
        var adress=prompt("请输入图片地址", "http://");
        if (adress) {
          comment_html.value += '<img src="' + adress + '" rel="external nofollow">';
        }
      });
  });
  </script>
  <?php $this->footer(); ?>
 </body>
</html>