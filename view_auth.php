<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/controller.php');

?>
<div class="container">
  <div class="col-md-4 offset-md-4">
    <form action="controller.php">
      <svg class="bi bi-person-fill" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
      </svg>

      <input class="form-control" name="name" type="text" value="" placeholder="Name" />
      <input class="form-control" name="pass" type="password" value="" placeholder="password" />

      <button class="btn-sm btn-info" data-action="return">Back</button>
      <button class="btn-sm btn-primary" data-action="login">Login</button>
    </form>
  </div>
</div>


