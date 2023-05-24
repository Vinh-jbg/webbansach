<?php
    include_once('./Views/admin/includes/notification.php');
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">Danh sách thể loại
            <form action="./index.php">
              <input type="hidden" name="controller" value="category">
              <input type="hidden" name="action" value="add">
              <button  type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                Thêm thể loại
              </button>
            </form>
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <?php require_once("./Views/admin/category/loadTable.php")?>
    </div>
  </div>
</div>
<?php
    include('./Views/admin/includes/formDelete.php');
 ?>
 <?php include_once('./Views/admin/includes/scripts.php'); ?> 
<script>
<?php if(isset($data['result'])) { ?>
     loadNotification()
<?php unset($data['result']); } ?>
</script>
