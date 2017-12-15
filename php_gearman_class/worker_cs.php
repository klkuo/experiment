<?php
class worker_cs
{
    private $workerObj;

    public function __construct()
    {
        $this->workerObj = new GearmanWorker();
        $this->workerObj->addServer(); // 預設為 localhost
        $this->workerObj->addFunction('sendEmail', array($this, 'handleMail'));
    }

    public function handleWorker()
    {
        while ($this->workerObj->work()) {
            if ($this->workerObj->returnCode() != GEARMAN_SUCCESS) {
                break;
            }
            sleep(1); // 無限迴圈，並讓 CPU 休息一下
        }
    }

    static public function handleMail($job)
    {
        $data = unserialize($job->workload());
        print_r($data);
        sleep(10); // 模擬處理時間
        echo "Email sending is done really.\n\n";
    }
}

$worker = new worker_cs();
$worker->handleWorker();
