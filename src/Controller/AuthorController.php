<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    // Show author by name (Exercice 1)
    #[Route('/author/{name}', name: 'author_show')]
    public function showAuthor(string $name): Response
    {
        return $this->render('author/show.html.twig', [
            'name' => $name
        ]);
    }

    // List all authors (Exercice 2)
    #[Route('/authors', name: 'list_authors')]
    public function listAuthors(): Response
    {
        $authors = [
            ['id' => 1, 'picture' => '/images/pic1.jpg', 'username' => 'Senda Smin', 'email' => 'senda.smin@esprit.tn', 'nb_books' => 100],
            ['id' => 2, 'picture' => '/images/pic2.jpg', 'username' => 'Malek Majouel', 'email' => 'malek.majouel@esprit.tn', 'nb_books' => 200],
            ['id' => 3, 'picture' => '/images/pic3.jpg', 'username' => 'Ezzedine', 'email' => 'ezzedine@gmail.com', 'nb_books' => 300],
        ];

        return $this->render('author/list.html.twig', [
            'authors' => $authors
        ]);
    }

    // Author details page
    #[Route('/author/details/{id}', name: 'author_details')]
    public function authorDetails(int $id): Response
    {
        $authors = [
            1 => ['id' => 1, 'picture' => '/images/pic1.jpg', 'username' => 'Senda Smin', 'email' => 'senda.smin@esprit.tn', 'nb_books' => 100],
            2 => ['id' => 2, 'picture' => '/images/pic2.jpg', 'username' => 'Malek Majouel', 'email' => 'malek.majouel@esprit.tn', 'nb_books' => 200],
            3 => ['id' => 3, 'picture' => '/images/pic3.jpg', 'username' => 'Ezzedine', 'email' => 'ezzedine@gmail.com', 'nb_books' => 300],
        ];

        if (!isset($authors[$id])) {
            throw $this->createNotFoundException('Auteur non trouvé');
        }

        return $this->render('author/showAuthor.html.twig', [
            'author' => $authors[$id]
        ]);
    }
}
