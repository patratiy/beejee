<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/controller.php');

?>
<div class="container">
  <div class="col-md-2 offset-md-10 text-right">
    <button class="btn-sm btn-success mt-2" data-action="login">
      <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
      </svg>
      Login
    </button>
  </div>

  <h1 class="col-md-12">
    Task Manager
  </h1>

  <div  class="row">
    <div class="col-md-3">
      <b>Name</b>
    </div>
    <div class="col-md-3">
      <b>e-mail</b>
    </div>
    <div class="col-md-3">
      <b>Description</b>
    </div>
    <div class="col-md-3">
      <b>Status</b>
    </div>
  </div>
</div>


