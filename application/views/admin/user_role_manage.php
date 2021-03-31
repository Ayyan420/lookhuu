<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-3">
                    <button data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/user_role_add';?>" id="menu" class="btn btn-sm btn-primary waves-effect waves-light"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo trans('add_user_permission'); ?></button> <br>
                    <br>
                </div>
                <div class="col-md-9">
                    <form class="form-inline pull-right" method="get" action="<?php echo base_url('admin/user_role_manage') ?>">
                        <div class="form-group mx-sm-3 mb-2 ">
                            <label for="title" class="sr-only">Name</label>
                            <input type="text" name="name" value="<?php if(isset($_GET['name'])){ echo $_GET['name'];} ?>" class="form-control" id="title" placeholder="Menu Name">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2"><span class="btn-label"><i class="fa fa-search"></i></span><?php echo trans("search");?></button>
                    </form>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo trans('sl'); ?></th>
                        <th><?php echo trans('option'); ?></th>
                        <th><?php echo trans('menu_id'); ?></th>
                        <th><?php echo trans('menu_name'); ?></th>
                        <th><?php echo trans('Allowed to Publisher'); ?></th>
                        <th><?php echo trans('created_at'); ?></th>
                        <th><?php echo trans('updated_at'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1;
                        foreach ($users as $user):                     

                    ?>
                    <tr id='row_<?php echo $user['user_permissions_id'];?>'>
                        <td><?php echo $sl++;?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-white btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/user_role_edit/'. $user['user_permissions_id'];?>" id="menu" title="<?php echo trans('edit'); ?>"><?php echo trans("edit");?></a></li>
                                  <li><a class="dropdown-item" href="#" title="<?php echo trans('delete'); ?>" onclick="delete_row(<?php echo " 'user_permissions' ".','.$user['user_permissions_id'];?>)" class="delete"><?php echo trans("delete");?></a></li>
                                </ul>
                            </div>
                        </td>
                        <td><strong><?php echo $user['menu_id'];?></strong></td>
                        <td><?php echo $user['menu_name'];?></td>
                        <td><input type="checkbox" <?php echo $user['is_allowed']==1?'checked':''; ?> name="is_allowed" value="1"/></td>
                        <td><?php echo date("d-m-Y, H:i:s",strtotime($user['created_at']));?></td>
                        <td><?php echo date("d-m-Y, H:i:s",strtotime($user['updated_at']));?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?php echo $links; ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

<!-- select2-->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<!-- select2-->