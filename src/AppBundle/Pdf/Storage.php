<?php

namespace AppBundle\Pdf;

interface Storage
{
    /**
     * @param string $username
     * @return boolean
     */
    public function hasCvFileFor($username);

    /**
     * @param string $username
     * @return \SplFileInfo
     */
    public function getCvFileFor($username);

    /**
     * @param $username
     * @param \SplFileInfo $fileInfo
     * @return
     */
    public function saveCvFileFor($username, $jobId, \SplFileInfo $fileInfo);

    /**
     *
     * @param string $username
     * @return string
     */
    public function getPathOfCvFileFor($username);
}
