<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

use Nelmio\ApiDocBundle\Attribute\Model;
use OpenApi\Attributes as OA;


#[Route('/client')]
final class ClientController extends AbstractController
{
    #[Route(name: 'app_client_index', methods: ['GET'])]

    #[OA\Get(
    path: '/client',
    tags: ['Clients'],
    summary: 'Lister les clients',
    responses: [
        new OA\Response(response: 200, description: 'Clients trouvés'),
        new OA\Response(response: 404, description: 'Clients introuvables'),
    ],
    content: new OA\JsonContent(
        type: 'array',
        items: new OA\Items(ref: new Model(type: Client::class))
    )
    )]

    public function index(ClientRepository $clientRepository): Response
    {
        return $this->render('client/index.html.twig', [
            'clients' => $clientRepository->findAll(),
        ]);
    }

    public function list(ClientRepository $clientRepository): JsonResponse
    {
        return $this->json($clientRepository->findAll());
    }


    #[Route('/new', name: 'app_client_new', methods: ['GET', 'POST'])]
    #[OA\Post(
        path: '/client/new',
        tags: ['Clients'],
        summary: 'Ajouter un client',
        responses: [
            new OA\Response(response: 200, description: 'Client trouvé'),
            new OA\Response(response: 404, description: 'Client introuvable'),
        ],
    )]
    #[OA\Get(
        path: '/client/new',
        tags: ['Clients'],
        summary: 'Ajouter un client',
        responses: [
            new OA\Response(response: 200, description: 'Client trouvé'),
            new OA\Response(response: 404, description: 'Client introuvable'),
        ],
    )]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('client/new.html.twig', [
            'client' => $client,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_show', methods: ['GET'])]
    #[OA\Get(
    path: '/client/{id}',
    tags: ['Clients'],
    summary: 'Retourne un client particulier',
    responses: [
        new OA\Response(response: 200, description: 'Client trouvé'),
        new OA\Response(response: 404, description: 'Client introuvable'),
    ],
    )]
    public function show(Client $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_client_edit', methods: ['GET', 'POST'])]
    #[OA\Post(
        path: '/client/{id}/edit',
        tags: ['Clients'],
        summary: 'Editer un client',
        responses: [
            new OA\Response(response: 200, description: 'Client trouvé'),
            new OA\Response(response: 404, description: 'Client introuvable'),
        ],
    )]
    public function edit(Request $request, Client $client, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('client/edit.html.twig', [
            'client' => $client,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_delete', methods: ['POST'])]
    public function delete(Request $request, Client $client, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($client);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
