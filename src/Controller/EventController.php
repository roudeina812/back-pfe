<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Event;
use App\Entity\Person;
use App\Repository\ArticleRepository;
use App\Repository\EventRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    private ManagerRegistry $managerRegistry;
    private EventRepository $repo;
    private ObjectManager $objectManager;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
        $this->repo = $this->managerRegistry->getRepository(Event::class);
        $this->objectManager = $this->managerRegistry->getManager();
    }
    #[Route('/event/getAll')]
    public function getAll(): Response
    {return $this->json($this->repo->findAll());}

    #[Route('/event/get/{id}')]
    public function get(int $id): Response
    {return $this->json($this->repo->find($id));}
    #[Route('/event/add')]
    public function add(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $event = new Article($data['title'], $data['date'], $data['location'], $data['organiser'], $data['description']);

        $this->objectManager->persist($event);

        $this->objectManager->flush();

        return $this->json('success');
    }

    #[Route('/event/update')]
    public function update(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $event = $this->repo->find($data['id']);
        $event->setTitle($data['title']);
        $event->setDate($data['date']);
        $event->setLocation($data['location']);
        $event->setDescription($data['description']);
        $event->setOrganiser($data['organiser']);

        return $this->json($event);
    }

    #[Route('/event/delete/{id}')]
    public function delete(int $id): Response
    {
        $this->repo->remove($id);
        return $this->json('success !!');
    }


}