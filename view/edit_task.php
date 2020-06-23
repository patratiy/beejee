<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/controller.php');

global $DATA_ROW;

?>
<div class="container">
  <div class="col-md-4 offset-md-4">
    <form action="/controller.php" class="pt-3">
        <div class="text-center">
        <svg class="bi bi-pencil-square" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
        </svg>
        </div>
        
        <label class="w-100">
            Your name
            <input class="form-control mb-2" maxlength="50" name="name" autocomplete="off" type="text" value="<?php echo $DATA_ROW[0]['name_user'] ?>" placeholder="Jonh" />
        </label>
        
        <label class="w-100">
            Your Email
            <input class="form-control mb-2" maxlength="100" name="email" autocomplete="off" type="text" value="<?php echo $DATA_ROW[0]['email'] ?>" placeholder="example@network.com" />
        </label>
        
        <label class="w-100">
            Your description
            <textarea name="description" maxlength="3000" autocomplete="off" class="form-control" ><?php echo $DATA_ROW[0]['description'] ?></textarea>
        </label>

        <label class="w-100">
            <input type="checkbox" name="fulfilled" <?php echo (unserialize($DATA_ROW[0]['status'])['fulfilled'] == 'true') ? 'checked' : ''; ?> />
            Fulfilled
        </label>

        <input type="hidden" name="id" value="<?php echo $DATA_ROW[0]['id'];?>" />

        <div class="alert alert-danger" style="display:none;" data-action="massage">
        </div>
        <div class="text-right">
            <button class="btn-sm btn-info" data-action="return">Back</button>
            <button class="btn-sm btn-primary" data-action="do_edit">
                <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                </svg>
                Save
            </button>
        </div>
    </form>
  </div>
</div>
