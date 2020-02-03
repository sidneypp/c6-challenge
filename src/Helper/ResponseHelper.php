<?php

namespace App\Helper;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ResponseHelper
{
    public static function normalize($data)
    {
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getId();
            },
        ];
        $normalizers = [
            new ObjectNormalizer(null, null, null, null, null, null, $defaultContext)
        ];

        $serializer = new Serializer($normalizers);
        return $serializer->normalize($data);
    }
}
