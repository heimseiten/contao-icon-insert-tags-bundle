<?php

namespace Heimseiten\ContaoIconInsertTagsBundle\EventListener;

use Contao\CoreBundle\Event\ContaoCoreEvents;
use Contao\CoreBundle\Event\GenerateSymlinksEvent;
use Terminal42\ServiceAnnotationBundle\Annotation\ServiceTag;

/**
 * @ServiceTag("kernel.event_listener", event=ContaoCoreEvents::GENERATE_SYMLINKS)
 */
class SymlinkListener
{
    public function __invoke(GenerateSymlinksEvent $event): void
    {
        $event->addSymlink('vendor/fortawesome/font-awesome/svgs', 'assets/fontawesome/svgs');
        $event->addSymlink('files/layout/icons/fontawesome/svgs/regular/phone.svg', 'assets/fontawesome/svgs/regular/phone.svg');
    }
}
