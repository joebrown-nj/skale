<?php

// namespace App\Models;

// use App\Models\EmailModel;
// use App\Models\LogModel;
// use MysqliDb;

// class LogModel
// {
//     private $db;
//     private $user;

//     public function __construct() {
//         $userController = new UserController();
//         $this->user = $userController->getUserLocation();
//         $this->db = new MysqliDb ($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
//     }

//     public function logButtonClick() {
//         $data = Array ('target' => isset($_POST['target']) ? $_POST['target'] : '',
//                     'url' => isset($_POST['url']) ? $_POST['url'] : '',
//                     'detail' => isset($_POST['detail']) ? $_POST['detail'] : '',
//                     'userInfo' => json_encode($this->user),
//                     'serverInfo' => json_encode($_SERVER)
//         );

//         try {
//             $this->db->insert ('log_button_clicks', $data);
//         } catch (Exception $e) {
//             die($e->getMessage());
//             error_log($e->getMessage());
//             return false;
//         }
//         return true;
//     }
 
//     public function validateEmail($email) {
//         return filter_var($email, FILTER_VALIDATE_EMAIL);
//     }

//     public function emailListSignup() {
//         if(!$this->validateEmail($_POST['email'])){
//             $error[] = 'A valid email is required';
//         }

//         if(empty($error)){
//             $msg = 'Thanks for joining the mailing list!';

//             $data = Array ('email' => $_POST['email'],
//                         'userInfo' => json_encode($this->user)
//             );

//             try {
//                 $this->db->insert ('email_list_signups', $data);
//             } catch (Exception $e) {
//                 die($e->getMessage());
//                 error_log($e->getMessage());
//                 return false;
//             }

//             echo json_encode(array('success' => $msg));
//             return true;
//         }

//         echo json_encode(array('error' => $error));
//         return false;
//     }
// }