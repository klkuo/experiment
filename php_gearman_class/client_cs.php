<?php
class client_cs
{
    private $clientObj;

    public function __construct()
    {
        $this->clientObj = new GearmanClient();
        $this->clientObj->addServer(); // 預設為 localhost
    }

    public function sendMail()
    {
        $emailData = array(
                'name' => 'web',
                'email' => 'member@example.com',
                );
        $this->clientObj->doBackground('sendEmail', serialize($emailData));
        echo "Email sending is done.\n";
    }
}

$grClient = new client_cs();
$grClient->sendMail();
