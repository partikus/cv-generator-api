<?php

namespace AppBundle\Pdf;

use Symfony\Component\Filesystem\Filesystem;

class LocalStorage implements Storage
{
    /**
     * @var Filesystem
     */
    private $fs;
    private $pdfStoragePath;

    public function __construct(Filesystem $filesystem, $pdfStoragePath)
    {
        $this->fs = $filesystem;
        $this->pdfStoragePath = $pdfStoragePath;
    }

    /**
     * @inheritdoc
     */
    public function hasCvFileFor($username)
    {
        $symlinkPath = $this->getPathOfCvFileFor($username);

        return !!$this->fs->exists($symlinkPath);
    }

    /**
     * @inheritdoc
     */
    public function getCvFileFor($username)
    {
        $symlinkPath = $this->getPathOfCvFileFor($username);

        return (new \SplFileInfo($symlinkPath))->get;
    }

    /**
     * @inheritdoc
     */
    public function saveCvFileFor($username, $jobId, \SplFileInfo $fileInfo)
    {
        $versionPath = sprintf("%s/%s.%s.pdf", $this->pdfStoragePath, $username, $jobId);
        $symlinkPath = $this->getPathOfCvFileFor($username);
        $relativePath = $this->fs->makePathRelative($versionPath, dirname($symlinkPath));
        $this->fs->dumpFile($versionPath, $content = file_get_contents($fileInfo->getRealPath()));
        chdir(dirname($versionPath));
        symlink(basename($versionPath), basename($symlinkPath));
    }

    /**
     * @inheritdoc
     */
    public function getPathOfCvFileFor($username)
    {
        return sprintf("%s/%s.current.pdf", $this->pdfStoragePath, $username);
    }
}
