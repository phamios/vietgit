<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default"> 
            <table class="table table-bordered table-striped">
                <?php if ($list_modules <> null): ?>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Link</th>
                            <th>Active</th>
                            <th>Autoload</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_modules as $value): ?>
                            <tr>
                                <td><?php echo $value->id ?></td>
                                <td><?php echo $value->mod_name ?></td>
                                <td><?php echo $value->mod_slug ?></td>
                                <td><?php echo $value->mod_link ?></td>
                                <td><?php echo $value->mod_active ?></td>
                                <td><?php echo $value->mod_autoload ?></td>
                                <td>
                                    <a data-toggle="modal" role="button" href="<?php echo site_url('admin/moduledmos/delete/'.trim($value->mod_name));?>">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
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