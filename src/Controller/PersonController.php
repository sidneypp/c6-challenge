<?php

namespace App\Controller;

use App\Entity\Person;
use App\Helper\ResponseHelper;
use App\Helper\XmlHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/person", name="person_")
 */
class PersonController extends AbstractController
{
    /**
     * @Route(name="index", methods={"GET"})
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Person::class);
        $persons = $repository->findAll();

        return $this->json(ResponseHelper::normalize($persons));
    }

    /**
     * @Route(name="store", methods={"POST"})
     */
    public function store(Request $request)
    {
        $file = $request->files->get('file');
        $fileContents = file_get_contents($file);

        $persons       = XmlHelper::deserialize($fileContents, 'App\Entity\Person[]', 'person');
        $entityManager = $this->getDoctrine()->getManager();
        foreach ($persons as $person) {
            $entityManager->persist($person);
        }
        $entityManager->flush();
        return $this->json(ResponseHelper::normalize($persons));
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(int $id)
    {
        $repository = $this->getDoctrine()->getRepository(Person::class);
        $person = $repository->find($id);

        return $this->json(ResponseHelper::normalize($person));
    }
}
