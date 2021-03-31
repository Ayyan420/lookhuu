<?php echo form_open(base_url() . 'admin/user_role_manage/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>

<h4 class="text-center"><?php echo trans('user_permissions'); ?></h4>
<hr>
<div class="form-group">
  <label class="control-label"><?php echo trans('menu_id'); ?></label>
  <input type="text" name="menu_id" class="form-control" placeholder="<?php echo trans('menu_id'); ?>" />
</div>
<div class="form-group">
  <label class="control-label"><?php echo trans('menu_name'); ?></label>
  <input type="text" name="menu_name" class="form-control" placeholder="<?php echo trans('menu_name'); ?>" />
</div>
<div class="form-group">
  <label class="control-label"><?php echo trans('is allowed for publisher? '); ?></label>
  <input type="checkbox" name="is_allowed" value="1"/>
</div>

<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span><?php echo trans('create'); ?> </button>
    <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal"><?php echo trans('close'); ?> </button>
  </div>
</div>
</form>
<script>
  jQuery(document).ready(function() {
    $('form').parsley();

  });
</script>