<?php 

require_once(__DIR__ . '/lib/rb.php');

class Model {
    private $host = 'mysql.iweb-workshop.myjino.ru';
    private $pass = 'kafkf*8Zqfez';
    private $login = '046975429_beejee';
    private $db_name = 'iweb-workshop_beejee';

    function __construct() {
        R::setup( "mysql:host={$this->host};dbname={$this->db_name}",$this->login, $this->pass );
        R::freeze( TRUE );
    }

    public function auth($login, $pass) {
        if (empty($pass) || empty($login)) {
            return 'required field is empty';
        }

        $user = R::findOne('users', ' user = ? ', [ $login ]);

        if ($user == null) {
            return 'user do not found';
        }
        if ($user->pass !== sha1($pass)) {
            return 'password do not match';
        }
        if ($user->pass === sha1($pass)) {
            session_start();
            $_SESSION['active_user'] = $login;
            return 'ok';
        }
    }

    public function addTask($data) {
        $aTask = R::dispense( 'tasks' );

        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            return 'email not valid';
        }

        if (empty($data['name']) || empty($data['email']) || empty($data['description'])) {
            return 'required field is empty';
        }

        if (strlen($data['name']) > 50) {
            return 'name too long';
        }

        if (strlen($data['email']) > 100) {
            return 'email too long';
        }

        if (!empty($data['name']) && !empty($data['email']) && !empty($data['description']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $aTask['name_user'] = htmlentities($data['name']);
            $aTask['email'] = htmlentities($data['email']);
            $aTask['description'] = htmlentities($data['description']);
            $aTask['status'] = serialize(['fulfilled' => 'false', 'admin_edit' => 'false']);
            R::store($aTask);
            return 'ok';
        }
    }

    public function editTask($data, $id) {

        $text = R::load('tasks', $id);

        session_start();
        if (!isset($_SESSION['active_user']) || $_SESSION['active_user'] != 'admin') {
            return 'You didn\'t have rights for edit';
        }

        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            return 'email not valid';
        }

        if (empty($data['name']) || empty($data['email']) || empty($data['description'])) {
            return 'required field is empty';
        }

        if (strlen($data['name']) > 50) {
            return 'name too long';
        }

        if (strlen($data['email']) > 100) {
            return 'email too long';
        }

        if (!empty($data['name']) && !empty($data['email']) && !empty($data['description']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $edit = 'false';
            if (sha1($text->description) != sha1($data['description'])) {
                $edit = 'true';
            }

            R::exec("UPDATE `tasks` SET `name_user` = :name, `email` = :email, `description` = :desc, `status` = :status WHERE `id` = :id", [ 
                'name' => $data['name'],
                'email' => $data['email'],
                'desc' => $data['description'],
                'status' => serialize(['fulfilled' => $data['fulfilled'], 'admin_edited' => $edit]),
                'id' => $id,
            ]);

            return 'ok';
        }
    }

    public function getDataRow($id) {
        $task = R::findOne( 'tasks', ' id = ? ', [ $id ] );

        if ($task == null) {
            return [];
        } else {
            return R::exportAll($task);
        }
    }

    public function getDataTabel() {
        $tasks = R::findAll( 'tasks' );
        return R::exportAll($tasks);
    }

    public function getDataPerPage($page, $sort = []) {
        if (!empty($sort)) {
            $all = R::exportAll(R::findAll( 'tasks', " ORDER BY {$sort['col']} {$sort['dir']} " ));
        } else {
            $all = R::exportAll(R::findAll( 'tasks' ));
        }
        
        $filtered = [];

        $count = ceil(count($all) / 3);

        $flag = null;

        if ($page == 1) {
            $flag = 'first';
        }

        if ($page == $count) {
            $flag = 'last';
        }

        $top_limit = (($page * 3) < count($all)) ? ($page * 3) : count($all);

        for ($i = ($page - 1) * 3; $i < $top_limit; $i++) {
            $filtered[] = $all[$i];
        }

        return [ 'data' => $filtered, 'pages' => $count, 'flag' => $flag ];
    }

    public function sortDataInTable($direction, $col) {
        $tasks_sorted = R::findAll( 'tasks' , " ORDER BY {$col} {$direction}" );
        return R::exportAll($tasks_sorted);
    }
}