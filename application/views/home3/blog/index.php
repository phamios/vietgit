<section id="about-us" class="container main">
    <div class="row-fluid">
        <div class="span8">
            <div class="blog"> 
            
                 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- mobilelifevn_primary_Blog1_728x90_as -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:728px;height:90px"
                         data-ad-client="ca-pub-2583883486961262"
                         data-ad-slot="1643223632"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>

                  <div class="gap"></div>
                <?php foreach($list_blog as $blog):?>
                <div class="blog-item well">
                    <a href="<?php echo site_url('blog-' . create_slug($blog->blog_title) . '-' . $blog->id . '.html'); ?>"><h2><?php echo $blog->blog_title?></h2></a>
                    <div class="blog-meta clearfix"> 
                    </div> 
                    <p>
                        <?php echo $blog->blog_short;?>
                    </p>

                </div>
                <?php endforeach;?>
                <!-- End Blog Item -->

                <div class="gap"></div>

                <!-- Paginationa -->
               
                <div class="pagination">
                   <?php echo $pages; ?>  
                </div> 

            </div>
        </div>
        <?php $this->load->view('home3/blog/sidebar'); ?>
    </div>

</section>

