<section id="about-us" class="container main">
    <div class="row-fluid">
        <div class="span8">
            <div class="blog"> 

                <?php foreach ($detail_blog as $blog): ?>
                    <div class="blog-item well">
                        <a href="<?php echo site_url('blog-' . create_slug($blog->blog_title) . '-' . $blog->id . '.html'); ?>"><h2><?php echo $blog->blog_title ?></h2></a>
                        <div class="blog-meta clearfix"> </div> 
                        <p>
                            <?php echo $blog->blog_short; ?>
                        </p>
                        <p>
                            <?php echo $blog->blog_des; ?>
                        </p> 
                    </div>
                <?php endforeach; ?>
                <!-- End Blog Item --> 
                <div class="gap"></div> 
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
            </div>
        </div>
        <?php $this->load->view('home3/blog/sidebar'); ?>
    </div> 
</section>

