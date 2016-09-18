<?php

namespace AppBundle\Pdf;

use AppBundle\Entity\Job as JobEntity;
use Doctrine\Common\Persistence\ObjectManager;
use Pheanstalk\Job;

class Receiver
{
    /**
     * @var ObjectManager
     */
    private $em;

    /**
     * @var Storage
     */
    private $storage;

    public function __construct(ObjectManager $manager, Storage $storage)
    {
        $this->em = $manager;
        $this->storage = $storage;
    }

    public function receive(Job $job)
    {
        $data = json_decode($job->getData(), true);

        if (!key_exists('id', $data) || !key_exists('body', $data)) {
            return;
        }

        $jobEntity = $this->em->getRepository(JobEntity::class)->findOneBy(['jobId' => $data['id']]);
        $employee = $jobEntity->getEmployee();
        $fileName = tempnam("/tmp", 'PSA');
        $file = new \SplFileInfo($fileName);
        $openedFile = $file->openFile('w+');
        $openedFile->fwrite(base64_decode($data['body']));
        $this->storage->saveCvFileFor($employee->getUsername(), $data['id'], $file);

    }
}