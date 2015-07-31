 
<div class="panel-heading" style="float:right;" > 
    <a href="<?php echo site_url('admincp/add_media'); ?>"   class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <p></p>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Mediatype</th> 
                    <th>Danh mục</th> 
                    <th>Media link</th> 
                    <th>Date</th> 
                    <th>Status</th>
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($list_media <> null): ?>
                    <?php foreach ($list_media as $value): ?>
                        <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php
                                if ($value->mediatype == 0) {
                                    echo 'Pictures';
                                }
                                else
                                    echo 'Videos';
                                ?></td>
                            <td>
                                <?php foreach ($list_catemedia as $media): ?>
                                    <?php if ($media->id == $value->cateid): ?>
                                        <?php echo $media->media_name; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td><img src="<?php echo base_url($value->medialink); ?>" alt="image" /></td>
                            <td><?php echo $value->meadiacreatedate; ?></td>
                            <td><?php if ($value->mediaactive == 1): ?>
                                    <label class="label label-success">Đang hoạt động</label>
                                <?php else: ?>
                                    <label class="label label-warning">Đã dừng</label>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a data-toggle="modal" class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admincp/media/edit/' . trim($value->id)); ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a data-toggle="modal" role="button" class="btn btn-xs btn-danger" href="<?php echo site_url('admin/media/del_media_picture/' . trim($value->id)); ?>">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div> 
</div>




