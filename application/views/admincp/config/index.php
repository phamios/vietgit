<?php foreach ($list_config as $config): ?> 
            <?php echo form_open_multipart('admincp/configsite'); ?> 
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            Cấu hình website
            <div class="pull-right" >
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                        <span class="glyphicon glyphicon-cog"></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('admincp/content'); ?>">Quay lại</a></li>
                    </ul>
                </div>
            </div>
        </div>
 
            <div class="panel-body"> 
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home"> 
                        <div class="form-group">
                            <label><?php echo $this->lang->line('sitename'); ?></label>
                            <input name="sitename" type="text" value="<?php echo $config->sitename ?>"  class="form-control">
                        </div>
 

                        <div class="form-group">
                            <label><?php echo $this->lang->line('address1'); ?></label>
                            <input name="address1" type="text" value="<?php echo $config->address1 ?>"   class="form-control">
                        </div>

                        <div class="form-group">
                            <label><?php echo $this->lang->line('address2'); ?></label>
                            <input name="address2" type="text"  value="<?php echo $config->address2 ?>"   class="form-control">
                        </div>

                        <div class="form-group">
                            <label><?php echo $this->lang->line('phone1'); ?></label>
                            <input name="phone1" type="text"  value="<?php echo $config->phone1 ?>"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label><?php echo $this->lang->line('phone2'); ?></label>
                            <input name="phone2" type="text" value="<?php echo $config->phone2 ?>"   class="form-control">
                        </div>
                        
                    </div> 
                </div> 
            </div> 
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-default"> 
            <div class="panel-body"> 
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home"> 
                         

                        <div class="form-group">
                            <label><?php echo $this->lang->line('meta_author'); ?></label>
                            <input name="meta_author" type="text"   value="<?php echo $config->meta_author ?>"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label><?php echo $this->lang->line('meta_des'); ?></label>

                            <textarea  name="meta_des" type="text" class="form-control"><?php echo $config->meta_des ?></textarea>
                        </div>

                        <div class="form-group">
                            <label><?php echo $this->lang->line('meta_keyword'); ?></label> 
                            <textarea  name="meta_keyword" type="text" class="form-control"><?php echo $config->meta_keyword ?></textarea>
                        </div> 
                        <div class="form-group">
                            <label><?php echo $this->lang->line('codeanalytic'); ?></label>
                            <input name="codeanalytic" type="text"  value="<?php echo $config->codeanalytic ?>"  class="form-control">
                        </div> 
                    </div> 
                </div>

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="btt_submit" type="submit"><i class="fa fa-save"></i> 
                        <?php echo $this->lang->line('save'); ?>
                    </button> 
                </div>

            </div> 
    </div>
</div>
<?php echo form_close(); ?>
        <?php endforeach; ?>


