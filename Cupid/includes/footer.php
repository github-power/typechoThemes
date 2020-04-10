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
<footer>
	<div class="foot-top container">
		<div class=" row">
			<div class="text-center" style="margin: 0 auto;padding: 0 20px;">
				<p><a href="http://www.beian.miit.gov.cn" target="_blank" rel="nofollow"><?php $this->options->indcon(); ?></a></p>
				<p>©<?php $this->options->title(); ?> |
					本站由<a href="http://typecho.org/" target="blank" rel="nofollow"> Typecho </a>强力驱动 |
					Theme is Cupid by <a href="https://blog.zwying.com/" target="blank">VeenZhao</a></p>
			</div>
		</div>
	</div>
	<script src="<?php Utils::indexTheme('assets/popper.min.js'); ?>"></script>
	<script src="<?php Utils::indexTheme('assets/bootstrap.min.js'); ?>"></script>
	<script src="<?php Utils::indexTheme('assets/main.js'); ?>"></script>
	<script>
		window.showSiteRuntime = function() {
			site_runtime = $("#site_runtime");
			if (!site_runtime) {
				return;
			}
			window.setTimeout("showSiteRuntime()", 1000);
			start = new Date("<?php $this->options->lovetime(); ?>");
			now = new Date();
			T = (now.getTime() - start.getTime());
			i = 24 * 60 * 60 * 1000;
			d = T / i;
			D = Math.floor(d);
			h = (d - D) * 24;
			H = Math.floor(h);
			m = (h - H) * 60;
			M = Math.floor(m);
			s = (m - M) * 60
			S = Math.floor(s);
			site_runtime.html("第 <span class=\"digit\">" + D + "</span> 天 <br/><span class=\"digit\">" + H + "</span> 小时 <span class=\"digit\">" + M + "</span> 分钟 <span class=\"digit\">" + S + "</span> 秒");
		};
		showSiteRuntime();
	</script>
	<?php $this->footer(); ?>
</footer>

</body>
</html>