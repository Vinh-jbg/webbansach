 <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">DELETE ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                <form action="./index.php" method="POST">
                    <input type="text" hidden id="delete_id" name='id'>
                    <input type="text" hidden  id="pageNumber" name='page'>
                    <input type="text" hidden name='controller' value="<?php if(isset($data['pageTitle'])){echo $data['pageTitle'];}?>">
                    <button type="submit" name="action" value="delete" class="btn btn-danger">DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>
