
<?php foreach($profile as $values):?>
<div class="row">
    <?php echo form_open_multipart('admincp/updatepass/'.$id); ?>
    <div class="col-md-8">
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home"> 
                <?php echo $notify;?>
                <div class="form-group">
                    <label><?php echo $this->lang->line('yourpassword'); ?></label>
                    <input name="yourpassword" type="password" value="<?php echo $values->upass?>"   class="form-control">
                </div>
   
            </div> 
        </div>

        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" name="btt_submitedit" type="submit"><i class="fa fa-save"></i> 
                <?php echo $this->lang->line('save'); ?>
            </button> 
        </div>
    </div> 
</div>

<?php echo form_close(); ?>
<?php endforeach;?>

