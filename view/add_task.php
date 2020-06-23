<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/controller.php');

?>
<div class="container">
  <div class="col-md-4 offset-md-4">
    <form action="/controller.php" class="pt-3">
        <div class="text-center">
            <svg class="bi bi-file-plus" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8h-1v5a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5V1z"/>
                <path fill-rule="evenodd" d="M13.5 1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V1.5a.5.5 0 0 1 .5-.5z"/>
                <path fill-rule="evenodd" d="M13 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
            </svg>
        </div>
        
        <label class="w-100">  
            Your name
            <input class="form-control mb-2" maxlength="50" name="name" autocomplete="off" type="text" value="" placeholder="Jonh" />
        </label>
        
        <label class="w-100">
            Your Email
            <input class="form-control mb-2" maxlength="100" name="email" autocomplete="off" type="text" value="" placeholder="example@network.com" />
        </label>
        
        <label class="w-100">
            Your description
            <textarea name="description" maxlength="3000" autocomplete="off" class="form-control" ></textarea>
        </label>

        <div class="alert alert-danger" style="display:none;" data-action="massage">
        </div>
        <div class="text-right">
            <button class="btn-sm btn-info" data-action="return">Back</button>
            <button class="btn-sm btn-primary" data-action="add">
                <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                </svg>
                Add
            </button>
        </div>
    </form>
  </div>
</div>
