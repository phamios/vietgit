<?php if ($catedetails <> null): ?>
    <?php foreach ($catedetails as $details): ?>
        <?php echo form_open_multipart('admincp/media/edit/' . $details->id); ?> 
        <div class="modal-body">

            <div class="tab-pane active in" id="home"> 
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input name="catename" type="text" value="<?php echo $details->catename; ?>"   class="form-control">
                </div>
                
                <div class="form-group">
                            <label>Loại</label>
                            <select name="catetype" required="required" class="form-control">
                                <option></option>
                                <option value="1" <?php if ($details->catetype == 1): ?>selected="selected"<?php endif; ?>>Hình ảnh</option>
                                <option value="2" <?php if ($details->catetype == 2): ?>selected="selected"<?php endif; ?>>Video</option>
                            </select>
                        </div>

                <div class="form-group">
                    <label>Danh mục cha ( optional )</label>
                    <select name="cateroot" id="cateroot" class="form-control">
                        <option value="0" selected="selected">------</option>
                        <?php if ($list_category <> null): ?>
                            <?php foreach ($list_category as $cateroot): ?>
                                <option <?php if ($details->cateroot == $cateroot->id): ?>selected="selected"<?php endif; ?> value="<?php echo $cateroot->id ?>"><?php echo $cateroot->catename ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo $this->lang->line('cateactive'); ?></label>
                    <select name="active" id="cateactive" class="form-control">
                        <option value="0" <?php if ($details->active == 0): ?>selected="selected"<?php endif; ?> >Unactive</option>
                        <option value="1" <?php if ($details->active == 1): ?>selected="selected"<?php endif; ?>>Active</option>
                    </select>
                </div>

            </div>   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button   class="btn btn-primary" name="btt_submitedit" type="submit">Save changes</button>
        </div>
        <?php echo form_close(); ?>
    <?php endforeach; ?>
<?php endif; ?>