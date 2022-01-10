<?php
require 'vendor/autoload.php';

use \Mailjet\Resources;

$mj = new \Mailjet\Client('3614054cb7ba034767f9ac4acb422f8b', 'a4556ae639ef606f4237b7c2fd26d910', true, ['version' => 'v3.1']);
if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['artiste']) and !empty($_Post['message'])) {
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
} else {
    header('Location: index.php');
    die();
}
