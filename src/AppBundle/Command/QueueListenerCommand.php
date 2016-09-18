<?php

namespace AppBundle\Command;

use AppBundle\Pdf\Receiver;
use Pheanstalk\Job;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class QueueListenerCommand extends ContainerAwareCommand
{
    public function configure()
    {
        $this->setName('queue:work');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $pheanstalk = $this->getContainer()->get('app.pheanstalk');
        /** @var Receiver $receiver */
        $receiver = $this->getContainer()->get('app.pdf.receiver');

        do {
            $job = $pheanstalk
                ->watch('done')
                ->ignore('todo')
                ->ignore('default')
                ->reserve();

            if (false === $job instanceof Job) {
                $output->writeln("No more PDF files to fetch");
                break;
            }

            $receiver->receive($job);
            $pheanstalk->delete($job);

        } while (1);
    }
}