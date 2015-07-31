<?php $this->load->view('admincp/users/createnew');?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default"> 
            <table class="table table-bordered table-striped">
                <?php if ($list_user <> null): ?>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User Name</th>
                            <th>Date Created</th> 
                            <th>Status</th>
                            <th>Type</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_user as $value): ?>
                            <tr>
                                <td><?php echo $value->id ?></td>
                                <td><?php echo $value->uname ?></td>
                                <td><?php echo $value->udate ?></td>
                                <td><?php if ($value->uactive == 1): ?>
                                        Active
                                    <?php else: ?>
                                        Stopped
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo $value->utype;?>
                                </td>
                                <td>
                                    <a data-toggle="modal" role="button" href="<?php echo site_url('admin/users/delete/' . trim($value->id)); ?>">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
<!--                                    <a data-toggle="modal" role="button" href="<?php echo site_url('admincp/catenews/' . trim($value->id)); ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>-->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                <?php else: ?>
                    <?php echo $this->lang->line('no_result'); ?>
                <?php endif; ?>
            </table>
        </div>
    </div>

</div>