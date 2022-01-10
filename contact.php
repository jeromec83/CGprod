<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;
define('API_PUBLIC_KEY', '3614054cb7ba034767f9ac4acb422f8b');
define('API_PRIVATE_KEY', 'a4556ae639ef606f4237b7c2fd26d910');


$mj = new \Mailjet\Client(API_PUBLIC_KEY, API_PRIVATE_KEY, true, ['version' => 'v3.1']);

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['artiste'])&& !empty($_Post['message'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $message = htmlspecialchars($_POST['message']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)); {

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "jeromec83@icloud.com",
                        'Name' => "CGPROD"
                    ],
                    'To' => [
                        [
                            'Email' => "jeromec83@icloud.com",
                            'Name' => "CGPROD"
                        ]
                    ],
                    'Subject' => "Demade de renseignement...",
                    'TextPart' => "$name, $email, $artiste, $message",
                    'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && var_dump($response->getData());
    }
    else{
        echo "Email non valide";
    }

} else {
    header('Location: index.php');
    die();
}
?>