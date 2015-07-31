<?php if($detail_blog <> null):?>
<section id="privacy-policy" class="container">
    <?php foreach ($detail_blog as $blog): ?>
        <h3><?php echo $blog->blog_title ?></h3>
        <p><?php echo $blog->blog_short; ?></p>
        <p><?php echo $blog->blog_des; ?></p>
        <p>&nbsp;</p> 
    <?php endforeach; ?>
    <div class="pagination">
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-comments" data-href="<?php echo site_url('blog-' . create_slug($blog->blog_title) . '-' . $blog->id . '.html'); ?>" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
    </div> 
</section>
<?php else:?>
    <?php redirect();?>
<?php endif;?>