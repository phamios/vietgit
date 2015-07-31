<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-group" id="accordion">
                    <?php if ($this->router->class == 'admincp'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admincp/main/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'menu'): ?>
                            <?php $this->load->view('admincp/navigator/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'configsite'): ?>
                            <?php $this->load->view('admincp/config/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'configslide'): ?>
                            <?php $this->load->view('admincp/slide/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'giftcard'): ?>
                            <?php $this->load->view('admincp/giftcard/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'catenews'): ?>
                            <?php $this->load->view('admincp/catenews/list'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'updatepass'): ?>
                            <?php $this->load->view('admincp/admin/updatepass'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'requestapp'): ?>
                            <?php $this->load->view('admincp/app/requestapp'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'listrequestapp'): ?>
                            <?php $this->load->view('admincp/app/listrequest'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'api'): ?>
                            <?php $this->load->view('admincp/api/list'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'blog'): ?>
                            <?php $this->load->view('admincp/blog/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'edit_blog'): ?>
                            <?php $this->load->view('admincp/blog/edit'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'add_blog'): ?>
                            <?php $this->load->view('admincp/blog/add'); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->router->class == 'moduledmos'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admincp/modules/list'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'create_new'): ?>
                            <?php $this->load->view('admincp/modules/create'); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->router->class == 'users'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admincp/users/list'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'profile'): ?>
                            <?php $this->load->view('admincp/users/profile'); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->router->class == 'media'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admincp/cateimage/list'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'pictures'): ?>
                            <?php $this->load->view('admincp/media/list_pictures'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'video'): ?>
                            <?php $this->load->view('admincp/media/list_video'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'create_new'): ?>
                            <?php $this->load->view('admincp/media/create_new'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'edit_catenews'): ?>
                            <?php $this->load->view('admincp/cateimage/edit'); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->router->class == 'app'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admincp/app/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'categories'): ?>
                            <?php $this->load->view('admincp/app/category'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'details_cate'): ?>
                            <?php $this->load->view('admincp/app/details'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'add_app'): ?>
                            <?php $this->load->view('admincp/app/addapp'); ?>
                        <?php endif; ?>
                    <?php endif; ?>


                    <?php if ($this->router->class == 'traffic'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admincp/traffic/list'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'update'): ?>
                            <?php $this->load->view('admincp/traffic/update'); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->session->userdata('admin_id') <> null): ?>
                        <?php foreach ($list_menu as $menu): ?>
                            <?php if ($this->router->class == trim($menu->mod_name)): ?>
                                <?php
                                $xml = simplexml_load_file('./application/modules/' . trim($menu->mod_name) . '/note.xml');
                                foreach ($xml->functions as $key => $value) {
                                    if ($this->router->fetch_method() == $value->name) {
                                        $this->load->view($value->view);
                                    }
                                }
                                ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


