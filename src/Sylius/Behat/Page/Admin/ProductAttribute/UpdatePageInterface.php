<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Behat\Page\Admin\ProductAttribute;

use Sylius\Behat\Page\Admin\Crud\UpdatePageInterface as BaseUpdatePageInterface;

interface UpdatePageInterface extends BaseUpdatePageInterface
{
    /**
     * @param string $name
     * @param string $language
     */
    public function changeName($name, $language);

    /**
     * @return bool
     */
    public function isCodeDisabled();

    /**
     * @return bool
     */
    public function isTypeDisabled();

    public function changeAttributeValue(string $oldValue, string $newValue): void;

    public function hasAttributeValue(string $value): bool;

    public function addAttributeValue(string $value, string $localeCode): void;

    public function deleteAttributeValue(string $value): void;
}
