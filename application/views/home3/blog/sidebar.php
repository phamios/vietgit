<aside class="span4">
            <div class="widget search">
                <?php //$this->load->view('home3/blog/widget/search'); ?>
            </div>
            <!-- /.search -->

            <!-- /.ads -->

            <div class="widget widget-popular">
                <h3>Bài viết mới nhất</h3>
                <div class="widget-blog-items">
                    
                    <?php foreach($relate_blog as $blog):?>
                    <div class="widget-blog-item media">
                        <div class="pull-left">
                            <div class="date">
                                <span class="month"><?php echo $blog->blog_date;?></span> 
                            </div>
                        </div>
                        <div class="media-body">
                            <a href="<?php echo site_url('blog-' . create_slug($blog->blog_title) . '-' . $blog->id . '.html'); ?>"><h5><?php echo $blog->blog_title;?></h5></a>
                        </div>
                    </div>
                      <?php endforeach;?>
                     

                </div>                        
            </div>
            <!-- End Popular Posts -->        
 

            <div class="widget">
                <h3>Tag Cloud</h3>
                <ul class="tag-cloud unstyled">
                    <li><a class="btn btn-mini btn-primary" href="<?php echo site_url('');?>">Ứng dụng Mobile</a></li>
                    <li><a class="btn btn-mini btn-primary" href="<?php echo site_url('');?>">Kiếm tiền online</a></li>
                    <li><a class="btn btn-mini btn-primary" href="<?php echo site_url('');?>">Build app mobile</a></li>
                    <li><a class="btn btn-mini btn-primary" href="<?php echo site_url('');?>">Tạo website tự động</a></li>
                    <li><a class="btn btn-mini btn-primary" href="<?php echo site_url('');?>">Tạo app tự động</a></li>
                    <li><a class="btn btn-mini btn-primary" href="<?php echo site_url('');?>">Kinh doanh online</a></li>
                    <li><a class="btn btn-mini btn-primary" href="<?php echo site_url('');?>">Cho thuê ứng dụng</a></li>
                    <li><a class="btn btn-mini btn-primary" href="<?php echo site_url('');?>">Thiết kế website</a></li>
                    <li><a class="btn btn-mini btn-primary" href="<?php echo site_url('');?>">Thiết kế ứng dụng mobile</a></li>
                </ul>
            </div> 

            <div class="widget">
                <h3>Ads by Google</h3>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- mobilelifevn_sidebar-right-1_AdSense1_250x250_as -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:250px;height:250px"
					     data-ad-client="ca-pub-2583883486961262"
					     data-ad-slot="5442214834"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>

					<!-- Google Tag Manager -->
					<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TNTS8W"
					height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
					<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
					new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
					j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
					'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
					})(window,document,'script','dataLayer','GTM-TNTS8W');</script>
					<!-- End Google Tag Manager -->


            </div>


            


            <!-- End Tag Cloud Widget -->

         
            <!-- End Archive Widget -->   

        </aside>