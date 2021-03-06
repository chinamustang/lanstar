<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="container">
    &copy; <?php echo date('Y');?> <a class="footer-item"
                                       href="<?php $this->options->siteUrl();?>"><?php $this->options->title();?></a>
    <br>
    <?php if ($this->options->recordNo):?>
        <a class="footer-item" target="_blank"
           href="http://beian.miit.gov.cn/"> <?php $this->options->recordNo();?></a>
    <?php endif;?>
    <br>
    <?php $this->options->footerEcho();?>
    <p class="footer-item">Designed by <b title="禁止仿制">染念</b></p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/twbs/bootstrap@v4.5.3/dist/js/bootstrap.min.js"></script>
<?php $this->options->jsEcho();?>
<?php if (!$this->is('index')):?>
    <script src="<?php if ($this->options->cdn): echo 'https://cdn.jsdelivr.net/gh/dyedd/lanstar@'.themeVersion().'/assets/js/prism.min.js';else:utils::indexTheme('assets/js/prism.js'); endif?>"></script>
    <script src="<?php if ($this->options->cdn): echo 'https://cdn.jsdelivr.net/gh/dyedd/lanstar@'.themeVersion().'/assets/owo/owo_02.min.js';else:utils::indexTheme('assets/owo/owo_02.js'); endif?>"></script>
    <script>let owoJson = '<?php utils::indexTheme('assets/owo/OwO_02.json'); ?>'</script>
    <script src="<?php if ($this->options->cdn): echo 'https://cdn.jsdelivr.net/gh/dyedd/lanstar@'.themeVersion().'/assets/js/page.min.js';else:utils::indexTheme('assets/js/page.js'); endif?>"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<?php endif;?>
<script src="https://cdn.jsdelivr.net/npm/nprogress@0.2.0/nprogress.min.js"></script>
<?php if($this->options->pjax && $this->options->pjax!=0) :?>
    <script src="https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js"></script>
    <script>
        $(document).pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"], a[no-pjax])', {
            container: '#pjax-container',
            fragment: '#pjax-container',
            timeout: 8000
        }).on('pjax:send',
            function() {
                NProgress.start();
                pageInit();
                highlight();
            }).on('pjax:complete',
            function() {
                NProgress.done();
                tipInit();
                <?php if ($this->is('index')):?>
                articleLike();
                <?php endif?>
                <?php if (!$this->is('index')):?>
                ac();
                catalogInit();
                pageLike();
                pjaxNavFix();
                <?php $this->options->pjax_complete(); ?>
                <?php endif?>
            })
    </script>
<?endif;?>
<?php if ($this->options->jsPushBaidu):?>
    <script src="<?php if ($this->options->cdn): echo 'https://cdn.jsdelivr.net/gh/dyedd/lanstar@'.themeVersion().'/assets/js/push.min.js';else:utils::indexTheme('assets/js/push.js'); endif?>"></script>
<?php endif;?>
<?php if($this->options->music): ?>
<meting-js fixed="true" lrc-type="1" <?php $this->options->music(); ?>>
</meting-js>
    <script src="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/meting@2.0.1/dist/Meting.min.js"></script>
<?php endif;?>
<script src="<?php if ($this->options->cdn): echo 'https://cdn.jsdelivr.net/gh/dyedd/lanstar@'.themeVersion().'/assets/js/extend.min.js';else:utils::indexTheme('assets/js/extend.js'); endif?>"></script>
<?php $this->footer(); ?>
<div class="back-to-top"></div>
<?php if ($this->options->compressHtml): $html_source = ob_get_contents(); ob_clean(); print utils::compressHtml($html_source); ob_end_flush(); endif; ?>
