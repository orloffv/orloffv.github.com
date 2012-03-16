<?php
    require_once('../vendor/sms24x7/sms24x7.php');
    require_once('config.php');

    $message = htmlspecialchars($_POST['message']);

    $result = null;

    if ($message)
    {
        $result =
        smsapi_push_msg_nologin(
            $email, $password, $phone, $message,
            array(
                'sender_name' => $sender_name,
                'api_v' => '1.1',
                'satellite_adv' => 'IF_EXISTS',
            )
        );
    }

    $return = array();

    if (! is_null($result) && count($result) == 3)
    {
        $return['status'] = 'success';
    }
    else
    {
        $return['status'] = 'fail';
    }

    echo json_encode($return);
?>