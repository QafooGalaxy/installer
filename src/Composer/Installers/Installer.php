<?php
namespace Composer\Installers;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;

class Installer extends LibraryInstaller
{
    const PACKAGE_TYPE = 'ansible-role';
    const ANSIBLE_ROLE_PATH = 'roles/';

    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        return self::ANSIBLE_ROLE_PATH;
    }

    public function uninstall(InstalledRepositoryInterface $repository, PackageInterface $package)
    {
        if (!$repository->hasPackage($package)) {
            throw new \InvalidArgumentException('Package is not installed: '.$package);
        }

        $repository->removePackage($package);

        $installPath = $this->getInstallPath($package);
        $this->io->write(sprintf('Deleting %s - %s', $installPath, $this->filesystem->removeDirectory($installPath) ? '<comment>deleted</comment>' : '<error>not deleted</error>'));
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return $packageType === self::PACKAGE_TYPE;
    }
}
