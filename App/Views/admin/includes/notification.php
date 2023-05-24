
<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 70px; min-width: 400px;">
  <!-- Position it -->
  <div style="position: absolute; top: 0; right: 0;">
    <!-- Then put toasts within -->
    <div class="bg-primary <?php if(isset($data['result']) && !$data['result']) {echo "bg-danger";} ?> text-white toast d-flex justify-content-between" style="min-width: 400px;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
      
      <div class="toast-body">
        <?php if(isset($data['message'])) {echo $data['message'];}?>
      </div>
      <div class="toast-header bg-primary <?php if(isset($data['result']) && !$data['result']) {echo "bg-danger";} ?> text-white">
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>

<?php include_once('./Views/admin/includes/scripts.php'); ?> 
<script>
<?php if(isset($data['result'])) { ?>
     loadNotification()
<?php unset($data['result']); } ?>
</script>
