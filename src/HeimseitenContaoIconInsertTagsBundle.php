<?php

declare(strict_types=1);

/*
 * This file is part of contao-icon-insert-tags-bundle.
 *
 * (c) heimseiten.de - Webdesign aus Köln 2025 <info@heimseiten.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/heimseiten/contao-icon-insert-tags-bundle
 */

namespace Heimseiten\ContaoIconInsertTagsBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimseitenContaoIconInsertTagsBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }
}
