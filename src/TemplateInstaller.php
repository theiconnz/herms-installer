<?php
namespace Theiconnz\HermsInstaller;
use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
class TemplateInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 7);
        if ('theicon' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, Herms backend installer '
                .'should always start their package name with '
                .'"theiconnz"'
                );
        }
        $tmpModule = $this->getModuelInstallName( $package->getPrettyName() );
        return 'module/'.$tmpModule ;
    }
    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'theiconnz-herms' === $packageType;
    }
    
    public function getModuelInstallName( $prefixname ){
        $tmp = ucwords( str_replace("-", " ", $prefixname ) );
        return str_replace(" ","", $tmp );
    }
}
