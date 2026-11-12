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

namespace Heimseiten\ContaoIconInsertTagsBundle\InsertTag;

use Contao\CoreBundle\DependencyInjection\Attribute\AsInsertTag;
use Contao\CoreBundle\InsertTag\InsertTagResult;
use Contao\CoreBundle\InsertTag\OutputType;
use Contao\CoreBundle\InsertTag\ResolvedInsertTag;
use Contao\CoreBundle\InsertTag\Resolver\InsertTagResolverNestedResolvedInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * {{icon::icon_name}} and {{icon::icon_name::css_class}} for files/layout/icons/icon_name.svg.
 *
 * Registered as a regular insert tag with a higher priority than the default (0), because
 * other bundles register an insert tag with the same name: RockSolid Custom Elements has
 * done so since version 2.5.0. Without the priority their tag wins and the icon disappears
 * without any output. Icons that do not exist in files/layout/icons/ are passed on to the
 * RockSolid Custom Elements tag if it is installed, so its own icons keep working.
 */
#[AsInsertTag('icon', priority: 100)]
class IconInsertTag implements InsertTagResolverNestedResolvedInterface
{
    public function __construct(
        #[Autowire('%kernel.project_dir%')]
        private readonly string $projectDir,
        #[Autowire(service: 'MadeYourDay\RockSolidCustomElements\InsertTag\IconInsertTag')]
        private readonly object|null $rockSolidIconInsertTag = null,
    ) {
    }

    public function __invoke(ResolvedInsertTag $insertTag): InsertTagResult
    {
        $name = (string) $insertTag->getParameters()->get(0);
        $cssClass = (string) $insertTag->getParameters()->get(1);

        // Only plain names and sub folders, no "..", so the tag cannot read files outside the icon folder
        if (1 === preg_match('~^[\w-]+(/[\w-]+)*$~', $name)) {
            $file = $this->projectDir.'/files/layout/icons/'.$name.'.svg';

            if (is_file($file)) {
                return new InsertTagResult(
                    '<i class="svg custom '.$name.' '.$cssClass.'">'.file_get_contents($file).'</i>',
                    OutputType::html,
                );
            }
        }

        if (null !== $this->rockSolidIconInsertTag) {
            return ($this->rockSolidIconInsertTag)($insertTag);
        }

        return new InsertTagResult('<i class="svg error '.$cssClass.'">icon not found</i>', OutputType::html);
    }
}
