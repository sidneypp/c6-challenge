<?php

namespace App\Helper;

use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;

class CustomArrayDenormalizer extends ArrayDenormalizer
{
    private $key;

    public function __construct(string $key = '')
    {
        $this->key = $key;
    }

    public function denormalize($data, $type, $format = null, array $context = [])
    {
        return parent::denormalize($this->key ? $data[$this->key] : $data, $type, $format, $context);
    }
}
