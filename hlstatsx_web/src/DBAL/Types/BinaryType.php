<?php

declare(strict_types=1);

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

/**
 * @deprecated
 * support legacy
 */
final class BinaryType extends AbstractEnumType
{
    final public const ZERO = 0;
    final public const ONE = 1;

    protected static array $choices = [
        self::ZERO => 'Zero',
        self::ONE => 'One',
    ];
}
