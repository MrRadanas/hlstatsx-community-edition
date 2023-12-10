<?php

declare(strict_types=1);

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

/**
 * @deprecated
 * support legacy
 */
final class ClanTagsPosition extends AbstractEnumType
{
    final public const EITHER = 'EITHER';
    final public const START = 'START';
    final public const END = 'END';

    protected static array $choices = [
        self::EITHER, self::START, self::END,
    ];
}
