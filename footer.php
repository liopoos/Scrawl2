<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package scrawl
 */
?>
</div>
<!-- #content -->

<a href="#0" class="cd-top">Top</a>
<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="site-info">
    <p>
    <h6>
      <div id="siyueapi"><font color=#888>2015-2016 <a href="http://www.mayuko.cn/" target="_blank">STACK+家族</a> <a href="http://www.miitbeian.gov.cn/" target="_blank">鲁ICP备15030196号 </a> by <a href="http://im.mayuko.cn" target="_blank">hades.</a></font></div>
      </p>
      <p>@hades's <a href="http://blog.mayuko.cn" target="_blank">堆栈</a> | <a href="https://blog.mayuko.cn/daily" target="_blank">日常</a> | <a href="http://lab.mayuko.cn/" target="_blank">实验室</a> | <a href="http://mayuko.cn/project" target="_blank">站点</a> | <a href="http://status.mayuko.cn/" target="_blank">监控</a> | <a href="https://blog.mayuko.cn/categories" target="_blank">归档</a> | <a href="https://blog.mayuko.cn/apis" target="_blank">API</a> | CNZZ提供<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1258008772'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1258008772' type='text/javascript'%3E%3C/script%3E"));</script>服务</p>
    </h6>
    <img src="<?php bloginfo('template_url'); ?>/images/footer.gif"/> </div>
  <!-- .site-info --> 
</footer>
<!-- #colophon -->
</div>
<!-- #page -->

<?php wp_footer(); ?>
<!--顶部进度条--> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-2.0.2.min.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/example1.js"></script> 
<a>
<div id="backtotop"></div>
</a> 
<script type="text/javascript">var isie6 = window.XMLHttpRequest ? false : true; function newtoponload() { var c = document.getElementById("backtotop"); function b() { var a = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop; if (a > 0) { if (isie6) { c.style.display = "none"; clearTimeout(window.show); window.show = setTimeout(function () { var d = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop; if (d > 0) { c.style.display = "block"; c.style.top = (400 + d) + "px" } }, 300) } else { c.style.display = "block" } } else { c.style.display = "none" } } if (isie6) { c.style.position = "absolute" } window.onscroll = b; b() } if (window.attachEvent) { window.attachEvent("onload", newtoponload) } else { window.addEventListener("load", newtoponload, false) } document.getElementById("backtotop").onclick = function () { window.scrollTo(0, 0) };</script>
</body></html>