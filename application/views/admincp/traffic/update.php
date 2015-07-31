this is page update 
<?php if ($list_traffic <> null): ?>
    <?php foreach ($list_traffic as $details): ?>
        <?php echo form_open_multipart('admin/traffic/update/' . $details->id); ?> 
        <div class="modal-body">

            <div class="tab-pane active in" id="home"> 
                <div class="form-group">
                    <label>Link</label>
                    <input name="link" type="text" value="<?php echo $details->link; ?>"   class="form-control">
                </div>

                <div class="form-group">
                    <label>Coins</label>
                    <input name="coins" type="text" value="<?php echo $details->coins; ?>"   class="form-control">
                </div>

                <div class="form-group">
                    <label>Views</label>
                    <input name="views" type="text" value="<?php echo $details->views; ?>"   class="form-control">
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