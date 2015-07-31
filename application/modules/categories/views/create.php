<div class="row">
    <?php echo form_open_multipart('categories/create_new'); ?>
    <div class="col-md-8">
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home">


                <div class="form-group">
                    <label><?php echo $this->lang->line('catename'); ?></label>
                    <input name="catename" type="text"   class="form-control">
                </div>

                <div class="form-group">
                    <label><?php echo $this->lang->line('cateorder'); ?></label>
                    <input name="cateorder" type="text"  value="0"  class="form-control">
                </div>
                <div class="form-group">
                    <label><?php echo $this->lang->line('catedisplay'); ?></label>
                    <select name="catedispay" id="catedispay" class="form-control">
                        <option value="0" selected="selected">None</option>
                        <option value="1"  >Active</option>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo $this->lang->line('cateroot'); ?></label>
                    <select name="cateroot" id="cateroot" class="form-control">
                        <option value="0" selected="selected">------</option>
                        <?php if ($list_category <> null): ?>
                            <?php foreach ($list_category as $cateroot): ?>
                                <option value="<?php echo $cateroot->id ?>"><?php echo $cateroot->catename ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo $this->lang->line('cateactive'); ?></label>
                    <select name="cateactive" id="cateactive" class="form-control">
                        <option value="0" > Unactive</option>
                        <option value="1" selected="selected"  >Active</option>
                    </select>
                </div>

            </div>


        </div>

        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" name="btt_submit" type="submit"><i class="fa fa-save"></i> 
                <?php echo $this->lang->line('save'); ?>
            </button>

            <a href="#myModal" data-toggle="modal" class="btn btn-danger">
                <?php echo $this->lang->line('delete'); ?>
            </a>
        </div>
    </div>


    <div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Delete Confirmation</h3>
                </div>
                <?php if (isset($id)): ?>
                    <div class="modal-body">
                        <p class="error-text">
                            <i class="fa fa-warning modal-icon"></i>
                            Are you sure you want to delete the user?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            <?php echo $this->lang->line('cancel'); ?>
                        </button>
                        <button class="btn btn-danger" data-dismiss="modal">
                            <?php echo $this->lang->line('delete'); ?>
                        </button>
                    </div>
                <?php else:?>
                     <div class="modal-body">
                        <p class="error-text">
                            <i class="fa fa-warning modal-icon"></i>
                           <?php echo $this->lang->line('can_not_delete');?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            <?php echo $this->lang->line('ok'); ?>
                        </button> 
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div> 
<?php echo form_close(); ?>
</div>