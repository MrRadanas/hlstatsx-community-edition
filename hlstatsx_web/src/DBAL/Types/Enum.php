<?php

declare(strict_types=1);

namespace App\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class Enum extends Type
{
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getStringTypeDeclarationSQL($column);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return null === $value ? null : (string) $value;
    }

    public function getName(): string
    {
        return 'enum';
    }
}
