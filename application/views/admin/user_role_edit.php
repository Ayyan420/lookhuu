<?php
$users    = $this->db->get_where('user_permissions', array('user_permissions_id' => $param2))->result_array();
foreach ($users as $row) :
  ?>
  <?php echo form_open(base_url() . 'admin/user_role_manage/update/' . $param2, array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>

  <h4 class="text-center"><?php echo trans('edit_user_permissions'); ?></h4>
  <hr>
  <div class="form-group">
    <label class="control-label"><?php echo trans('menu_id'); ?></label>
    <input type="text" name="menu_id" value="<?php echo $row['menu_id']; ?>" class="form-control" placeholder="Enter menu id" />
  </div>
  <div class="form-group">
    <label class="control-label"><?php echo trans('menu_name'); ?></label>
    <input type="text" name="menu_name" value="<?php echo $row['menu_name']; ?>" class="form-control" placeholder="Enter Menu Name" />
  </div>
<div class="form-group">
  <label class="control-label"><?php echo trans('is allowed for publisher? '); ?></label>
  <input type="checkbox" <?php echo $row['is_allowed']==1?'checked':''; ?> name="is_allowed" value="1"/>
</div>
<?php endforeach; ?>
<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <button type="submit" class="btn btn-sm btn-primary waves-effect"><span class="btn-label"><i class="fa fa-floppy-o"></i></span><?php echo trans('create'); ?> </button>
    <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal"><?php echo trans('close'); ?> </button>
  </div>
</div>
</form>
<script>
  jQuery(document).ready(function() {
    $(".select2").select2();
    $('form').parsley();

  });
</script>