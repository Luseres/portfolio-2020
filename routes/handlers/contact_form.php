<?php
if (isset($_POST['token'], $_POST['name'], $_POST['email'], $_POST['message'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {
        store_analytic($GLOBALS['ip'], $GLOBALS['user'], $GLOBALS['source'], $_SESSION['token'], $GLOBALS['lang'], "contact_form");
        if(strlen($_POST['name']) > 255 || strlen($_POST['name']) < 2) {
            echo json_encode(["error" => true, "response" => "Invalid name specified."]);
            exit();
        }
        if(strlen($_POST['email']) > 255 || strlen($_POST['email']) < 6) {
            echo json_encode(["error" => true, "response" => "Invalid email specified."]);
            exit();
        }
        if(strlen($_POST['message']) > 255 || strlen($_POST['message']) < 6) {
            echo json_encode(["error" => true, "response" => "Invalid message specified."]);
            exit();
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["error" => true, "response" => "Invalid email specified."]);
            exit();
        }

        $email = $_POST['email'];
        $name = $_POST['name'];
        $footer = PHP_EOL . PHP_EOL . 
                    "Sender information: ".PHP_EOL."
                    Name: " . _re($name) . PHP_EOL."
                    Email: " . _re($email) . PHP_EOL."
                    IP: " . $_SERVER['REMOTE_ADDR'] . PHP_EOL."
                    User Agent: " . _re($_SERVER['HTTP_USER_AGENT']);
        $receiver = 'portfolio@jvdpoll.nl';
        $subject = 'Portfolio message from ' . _re($name);
        $message = _re($_POST['message'] . $footer);
        $headers = 'From: ' . _re($email) . PHP_EOL .
                   'X-Mailer: PHP/' . phpversion();
        mail($receiver, $subject, $message, $headers);
        echo json_encode(["error" => false, "response" => "Form has been sent."]);

        exit();
    } else {
        echo json_encode(["error" => true, "response" => "Invalid token specified."]);
        exit();
    }
} else {
    echo json_encode(["error" => true, "response" => "Invalid parameters specified."]);
    exit();
}