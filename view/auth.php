<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/controller.php');

?>
<div class="container">
  <div class="col-md-4 offset-md-4">
    <form action="/controller.php" class="text-center pt-3">
      <svg class="bi bi-person-fill mb-4" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
      </svg>

      <input class="form-control mb-2" name="name" maxlength="50" autocomplete="off" type="text" value="" placeholder="Name" />
      <input class="form-control mb-2" name="pass"  maxlength="40" autocomplete="off" type="password" value="" placeholder="password" />

      <div class="alert alert-danger" style="display:none;" data-action="massage">
      </div>
      <div class="text-right">
        <button class="btn-sm btn-info" data-action="return">Back</button>
        <button class="btn-sm btn-primary" data-action="authorize">
          <svg class="bi bi-box-arrow-in-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 0 1 0-.708L10.793 8 8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 1 8z"/>
            <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0 0 15 13V3a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 4 3v1.5a.5.5 0 0 0 1 0V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5h-8A.5.5 0 0 1 5 13v-1.5a.5.5 0 0 0-1 0V13a1.5 1.5 0 0 0 1.5 1.5h8z"/>
          </svg>
          Login
        </button>
      </div>
    </form>
  </div>
</div>


