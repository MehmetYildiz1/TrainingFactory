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
//    /**
//     * @Route("/lid", name="create_product")
//     */
//    public function createActiviteit()
//    {
//        // you can fetch the EntityManager via $this->getDoctrine()
//        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $activiteit = new Activiteit();
//        $activiteit->setNaam('MMA');
//        $activiteit->setDescription('MMA combineert technieken uit verschillende vechtsporten, zoals
//        kickboksen, thaiboksen, judo, worstelen (grappling), boksen en jiujitsu. Het doel hiervan is het
//        vormen van de meest effectieve vechtsport voor een in theorie vrij gevecht. Ondanks het beeld wat
//         mensen hebben van MMA zijn echt niet alle technieken geoorloofd. Zo is het niet toegestaan om een
//         tegenstander die op de grond ligt tegen het hoofd te trappen of te knieën.');
//        $activiteit->setDuration(60);
//        $activiteit->setCosts(150);
//
//        // tell Doctrine you want to (eventually) save the Product (no queries yet)
//        $entityManager->persist($activiteit);
//
//        // actually executes the queries (i.e. the INSERT query)
//        $entityManager->flush();
//
//        return new Response('Saved new product with id '.$activiteit->getId());
//    }
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
    public function show()
    {
        $activiteit = $this->getDoctrine()
            ->getRepository(Activiteit::class)
            ->findAll();

        if (!$activiteit) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this ->render("lid/Kalenderpage.html.twig", ['activiteit'=>$activiteit]);


        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/home")
     */
    public function Homepage()
    {
        return $this->render('lid/Homepage.html.twig');
    }



}

