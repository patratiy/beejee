<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/controller.php');
global $DATA_TAB;
?>
<div class="container">
  <div class="col-md-2 offset-md-10 text-right">
    <?php if (isset($_SESSION['active_user']) && !empty($_SESSION['active_user'])): ?>
      <?php echo $_SESSION['active_user'];?>
      <button class="btn-sm btn-success mt-2 ml-4" data-action="logout" data-user="<?php echo $_SESSION['active_user'];?>">
        <svg class="bi bi-box-arrow-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M11.646 11.354a.5.5 0 0 1 0-.708L14.293 8l-2.647-2.646a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
          <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
          <path fill-rule="evenodd" d="M2 13.5A1.5 1.5 0 0 1 .5 12V4A1.5 1.5 0 0 1 2 2.5h7A1.5 1.5 0 0 1 10.5 4v1.5a.5.5 0 0 1-1 0V4a.5.5 0 0 0-.5-.5H2a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-1.5a.5.5 0 0 1 1 0V12A1.5 1.5 0 0 1 9 13.5H2z"/>
        </svg>
        Logout
      </button>
    <?php else: ?>
      <button class="btn-sm btn-success mt-2" data-action="login">
        <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
        Login
      </button>
    <?php endif; ?>
  </div>

  <h1 class="col-md-12">
    Task Manager
  </h1>

  <div  class="row">
    <div class="col-md-3 col-2 border-right border-bottom pt-2 pb-2 sort <?php echo $_REQUEST['field'] == 'name' ? 'sort-' . $_REQUEST['sort'] : '';?>">
      <b>Name</b>
    </div>
    <div class="col-md-3 col-2 border-right border-bottom pt-2 pb-2 sort <?php echo $_REQUEST['field'] == 'email' ? 'sort-' . $_REQUEST['sort'] : '';?>">
      <b>Email</b>
    </div>
    <div class="col-md-3 col-4 border-right border-bottom pt-2 pb-2">
      <b>Description</b>
    </div>
    <div class="col-md-3 col-4 pt-2 border-bottom pb-2 sort <?php echo $_REQUEST['field'] == 'status' ? 'sort-' . $_REQUEST['sort'] : '';?>">
      <b>Status</b>
    </div>
  </div>

  <?php if(!empty($DATA_TAB['data'])): ?>
      <?php foreach($DATA_TAB['data'] as $key => $arr): ?>
        <div  class="row" data-id="<?php echo $arr['id'];?>">
          <div class="col-md-3 col-2 border-right pt-2 pb-2 text-break">
            <?php echo $arr['name_user'];?>
          </div>
          <div class="col-md-3 col-2 border-right pt-2 pb-2 text-break">
            <?php echo $arr['email'];?>
          </div>
          <div class="col-md-3 col-4 border-right pt-2 pb-2 text-break">
            <?php echo $arr['description'];?>
          </div>
          <div class="<?php echo ($_SESSION['active_user'] == 'admin') ? 'col-md-2 col-2' : 'col-md-3 col-2';?> pt-2 pb-2">
            <?php 
              $arr = unserialize($arr['status']);
              if ($arr['fulfilled'] == 'true') {
                ?>
                <svg data-toggle="tooltip" title="Fulfilled" class="bi bi-check mr-3" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                </svg>
                <?php
              }
              if ($arr['admin_edited'] == 'true') {
                ?>
                <svg data-toggle="tooltip" title="Edited by Admin" class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                  <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                </svg>  
                <?php
              }
            ?>
          </div>
          <?php if ($_SESSION['active_user'] == 'admin'):?>
            <div class="col-md-1 col-2">
              <button class="btn-sm btn-primary mt-1" data-action="edit">
                <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                Edit
              </button>
            </div>
          <?php endif ?>
        </div>
      <?php endforeach; ?>
      
    <div class="row pagination">
        <?php if ($DATA_TAB['flag'] == 'last' || $DATA_TAB['flag'] == null): ?>
        <button class="btn-sm mr-1 btn-light" data-action="prev">
        <svg class="bi bi-chevron-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
        </svg>
        </button>
        <?php endif; ?>
        <?php
        for ($i = 1; $i <= $DATA_TAB['pages']; $i++):
        ?>
        <button class="btn-sm mr-1 <?php echo ($i == explode('/', $_SERVER['REQUEST_URI'])[2]) ? 'btn-primary pag-active' : 'btn-light'; ?>"><?php echo $i; ?></button>
        <?php endfor; ?>
        <?php if ($DATA_TAB['flag'] == 'first' || $DATA_TAB['flag'] == null): ?>
        <button class="btn-sm mr-1 btn-light" data-action="next">
        <svg class="bi bi-chevron-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
        </svg>
        </button>
        <?php endif; ?>
    </div>

  <?php else: ?>
    <div  class="row pt-2 pb-2">
      <div class="col-md-12">
        <h5 class="text-center pt-4">Any task not yet added.</h5>
      </div>
    </div>
  <?php endif; ?>
  

  <button class="btn btn-secondary mt-2 float-right" data-action="addtask">Add task</button>
</div>


