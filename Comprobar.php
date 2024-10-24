<?php

if (!empty($_POST['action'])) {
    if ($_POST['action'] === 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $authController = new Authentication();
        $authController->processLogin($email, $password);
    }
}

class Authentication {
    public function processLogin($email, $password) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => 'ruju_20@alu.uabcs.mx','password' => '123456817'),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;


        $responseData = json_decode($response);
        if (isset($responseData->message) && $responseData->message === 'Registro correcto' && is_object($responseData->data)) {
            header('Location: Ejercicio9.html');
            exit();
        }
    }
}

?>
