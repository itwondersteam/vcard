<?php

namespace JeroenDesloovere\VCard\Parser\Property;

use JeroenDesloovere\VCard\Property\Name;
use JeroenDesloovere\VCard\Property\NodeInterface;

final class NameParser extends PropertyParser implements NodeParserInterface
{
    public function parseLine(string $value, array $parameters = []): NodeInterface
    {
        @list($firstName, $additional, $lastName, $prefix, $suffix) = explode(';', $value);

        $this->convertEmptyStringToNull([
            $lastName,
            $firstName,
            $additional,
            $prefix,
            $suffix
        ]);

        return new Name($lastName, $firstName, $additional, $prefix, $suffix);
    }
}
