<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default"> 
            <table class="table table-bordered table-striped">
                <?php if ($arr_modules <> null): ?>
                    <thead>
                        <tr> 
                            <th><?php echo $this->lang->line('name_modules'); ?></th> 
                            <th><?php echo $this->lang->line('intro_modules'); ?></th>
                            <th><?php echo $this->lang->line('type_modules'); ?></th> 
                            <th><?php echo $this->lang->line('activity_modules'); ?></th>
                            <th>Database</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $arrlength = count($arr_modules); ?>
                        <?php for ($x = 0; $x < $arrlength; $x++) : ?>
                            <tr>
                                <td><?php echo ucfirst($arr_modules[$x]); ?></td>
                                <td>
                                    <?php
                                    $content = simplexml_load_file('./application/modules/' . trim($arr_modules[$x]) . '/note.xml');
                                    foreach ($content->modules_des as $key => $value) {
                                        echo $content->content;
                                    }
                                    ?> 
                                </td>
                                <td>
                                    <?php
                                    $xml = simplexml_load_file('./application/modules/' . trim($arr_modules[$x]) . '/note.xml');
                                    foreach ($xml->modules_type as $key => $value) {
                                        if ($value->type == 1) {
                                            echo "Admin";
                                        } else {
                                            echo "Frontend";
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('admin/moduledmos/create_new/' . $arr_modules[$x]); ?>">
                                        <?php echo $this->lang->line('active_now'); ?> 
                                    </a>
                                </td>
                                <td>
                                    <?php if (file_exists('./application/modules/' . trim($arr_modules[$x]) . '/' . trim($arr_modules[$x]) . '.sql')): ?>
                                        <a href="<?php echo site_url('admin/moduledmos/updatedb/' . trim($arr_modules[$x])); ?>">Update Database</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                <?php else: ?>
                    <?php echo $this->lang->line('no_result'); ?>
                <?php endif; ?>
            </table>
        </div>
    </div>

</div>