<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyUserController extends Controller
{
    public function verifyPremiumUser(Request $request){
        $db             = env('DB_DATABASE');
        $dbuser         = env('DB_USERNAME');
        $dbpassword     = env('DB_PASSWORD');
        $dbhost         = env('DB_HOST');
        $dbport         = env('DB_PORT');

        $return["error"] = false;
        $return["message"] = "";
        $return["success"] = false;

        $link = mysqli_connect($dbhost, $dbuser, $dbpassword, $db, $dbport);

        $jsonData = file_get_contents('php://input');

        // Decode the JSON data into a PHP associative array
        $data = json_decode($jsonData, true);

        $email = $data['email'];
        $password = $data['password'];

        if($email && $password) {
            $email = mysqli_real_escape_string($link, $email);
            $sql = "SELECT * FROM users WHERE email = '$email' and account_type='PREMIUM'";

            $res = mysqli_query($link, $sql);
            $numrows = mysqli_num_rows($res);
            if($numrows > 0){
                // is there any data with that email
                $obj = mysqli_fetch_object($res);
                // get row as object

                if (password_verify($password, $obj->password)) {
                    if($obj->premium_login_status == true){
                        $return["error"] = true;
                        $return["message"] = "Already logged in another device !!";
                    }
                    else{
                        $update_status = "UPDATE users SET premium_login_status=0 where email='$email' AND account_type='PREMIUM'";
                        if(mysqli_query($link,$update_status)){
                            $return["success"] = true;
                            $return["message"] = "Login success";
                        }
                        else{
                            $return["error"] = true;
                            $return["message"] = "Login failed. Please try again !!";
                        }
                        
                    }
                    
                }
                else{
                    $return["error"] = true;
                    $return["message"] = "Your Password is Incorrect.";
                }
            }
            else {
                $return["error"] = true;
                $return["message"] = "No email found !!";
            }
        }
        else{
            $return["error"] = true;
            $return["message"] = 'Send all parameters';
        }

        mysqli_close($link);

        header('Content-Type: application/json');

        return response()->json($return);
    }
}
