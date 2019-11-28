<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Activiteit;
use App\Entity\Lesson;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class BezoekerController extends AbstractController
{
    /**
     * @Route("/bezoeker", name="create_product")
     */
    public function createActiviteit()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $activiteit = new Activiteit();
        $activiteit->setNaam('Mehmet');
        $activiteit->setDescription('Dit is een persoon!');
        $activiteit->setDuration(24);
        $activiteit->setCosts(250);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($activiteit);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$activiteit->getId());
    }
//
//    public function createLesson()
//    {
//        // you can fetch the EntityManager via $this->getDoctrine()
//        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $lesson = new Lesson();
//        $lesson->setTime();
//        $lesson->setDate();
//        $lesson->setLocation("Vijverzicht 125");
//        $lesson->setMaxPersons(25);
//
//        // tell Doctrine you want to (eventually) save the Product (no queries yet)
//        $entityManager->persist($lesson);
//
//        // actually executes the queries (i.e. the INSERT query)
//        $entityManager->flush();
//
//        return new Response('Saved new product with id '.$lesson->getId());
//    }
    /**
     * @Route("/activiteit/{id}")
     */
    public function show($id)
    {
        $activiteit = $this->getDoctrine()
            ->getRepository(Activiteit::class)
            ->find($id);

        if (!$activiteit) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this ->render("/product/index.html.twig", ['activiteit'=>$activiteit]);


        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/colum")
     */
    public function Homepage()
    {
        return $this->render('bezoeker/Homepage.html.twig');
    }
    /**
     * @Route("/kalender")
     */
    public function kalenderpage()
    {
        return $this->render('bezoeker/Kalenderpage.html.twig');
    }



}

