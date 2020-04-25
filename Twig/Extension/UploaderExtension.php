<?php

namespace Vich\UploaderBundle\Twig\Extension;

use Vich\UploaderBundle\Storage\StorageInterface;

/**
 * UploaderExtension.
 *
 * @author Dustin Dobervich <ddobervich@gmail.com>
 */
class UploaderExtension extends \Twig_Extension
{
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * Returns the canonical name of this helper.
     *
     * @return string The canonical name
     */
    public function getName()
    {
        return 'vich_uploader';
    }

    /**
     * Returns a list of twig functions.
     *
     * @return array An array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('vich_uploader_asset', array($this, 'asset'))
        );
    }

    /**
     * Gets the public path for the file associated with the uploadable
     * object.
     *
     * @param  object $obj   The object.
     * @param  string $field The field.
     * @return string The public path.
     */
    public function asset($obj, $field)
    {
        return $this->storage->resolveUri($obj, $field);
    }
}
