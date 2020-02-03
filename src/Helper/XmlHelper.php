<?php

namespace App\Helper;

use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class XmlHelper
{
    public static function deserialize($data, string $entity, string $key)
    {
        $normalizers = [
            new ObjectNormalizer(null, null, null, new ReflectionExtractor()),
            new GetSetMethodNormalizer(),
            new CustomArrayDenormalizer($key)
        ];
        $serializer = new Serializer($normalizers, [new XmlEncoder()]);
        return $serializer->deserialize($data, $entity, 'xml');
    }
}
