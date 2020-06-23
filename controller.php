<?php

require_once(__DIR__ . '/model.php');

$model = new Model();

if (isset($_REQUEST['password']) && isset($_REQUEST['login'])) {
    $status = $model->auth($_REQUEST['login'], $_REQUEST['password']);
    echo json_encode(['status' => $status]);
    die();
}

if (isset($_REQUEST['add'])) {
    $data = [
        'name' => $_REQUEST['name'],
        'email' => $_REQUEST['email'],
        'description' => $_REQUEST['description'],
    ];
    $status = $model->addTask($data);
    echo json_encode(['status' => $status]);
    die();
}

if (isset($_REQUEST['edit'])) {
    $data = [
        'name' => $_REQUEST['name'],
        'email' => $_REQUEST['email'],
        'description' => $_REQUEST['description'],
        'fulfilled' => $_REQUEST['fulfilled'],
    ];
    
    $status = $model->editTask($data, $_REQUEST['id']);
    echo json_encode(['status' => $status]);
    
    die();
}

if (isset($_REQUEST['logout'])) {
    session_start();
    unset($_SESSION['active_user']);
    
    echo json_encode(['status' => 'ok']);
    die();
}

if (preg_match('/page/', $_SERVER['REQUEST_URI'])) {
    session_start();
    global $DATA_TAB;

    $data_url = explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]);
    
    if (isset($_REQUEST['sort'])) {
        $sort = [
            'col' => ($_REQUEST['field'] == 'name') ? $_REQUEST['field'] . '_user' : $_REQUEST['field'],
            'dir' => strtoupper($_REQUEST['sort']),
        ];
        $DATA_TAB = $model->getDataPerPage($data_url[2], $sort);
    } else {
        $DATA_TAB = $model->getDataPerPage($data_url[2]);
    }
    
    @include(__DIR__ . '/view/page.php');
} elseif (preg_match('/addtask/', $_SERVER['REQUEST_URI'])) {
    @include(__DIR__ . '/view/add_task.php');
} elseif (preg_match('/edittask/', $_SERVER['REQUEST_URI'])) {
    session_start();
    global $DATA_ROW;

    $data_url = explode('/', $_SERVER['REQUEST_URI']);
    
    $DATA_ROW = $model->getDataRow($data_url[2]);
    @include(__DIR__ . '/view/edit_task.php');
} elseif (preg_match('/auth/', $_SERVER['REQUEST_URI'])) {
    @include(__DIR__ . '/view/auth.php');
} elseif (preg_match('/main/', $_SERVER['REQUEST_URI'])) {
    session_start();
    global $DATA_TAB;
    if (isset($_REQUEST['sort'])) {
        $DATA_TAB = $model->sortDataInTable(strtoupper($_REQUEST['sort']), ($_REQUEST['field'] == 'name') ? $_REQUEST['field'] . '_user' : $_REQUEST['field']);
    } else {
        $DATA_TAB = $model->getDataTabel();
    }
    @include(__DIR__ . '/view/main.php');
} else {
    session_start();
    global $DATA_TAB;
    if (isset($_REQUEST['sort'])) {
        $DATA_TAB = $model->sortDataInTable(strtoupper($_REQUEST['sort']), ($_REQUEST['field'] == 'name') ? $_REQUEST['field'] . '_user' : $_REQUEST['field']);
    } else {
        $DATA_TAB = $model->getDataTabel();
    }
    @include(__DIR__ . '/view/main.php');
}