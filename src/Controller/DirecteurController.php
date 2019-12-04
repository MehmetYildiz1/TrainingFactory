<?php


namespace App\Controller;


use App\Form\Type\ActiviteitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Activiteit;
use App\Entity\Lesson;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DirecteurController extends AbstractController
{
    /**
     * @Route("/activiteit", name="activiteit")
     */
    public function new(Request $request)
    {
        // creates a task object and initializes some data for this example
        $activiteit = new Activiteit();

        $form = $this->createForm(ActiviteitType::class, $activiteit);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $activiteit = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($activiteit);
            $entityManager->flush();

            return $this->redirectToRoute('activiteit');
        }
        // ...
        return $this->render('directeur/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/kalender")
     */
    public function listAction()
    {
        $activiteiten = $this->getDoctrine()
            ->getRepository(Activiteit::class)
            ->findAll();

        if(!$activiteiten) {
            throw $this->createNotFoundException('no product found ');
        }

        return $this->render("/directeur/Kalenderpage.html.twig" , ['activiteiten'=>$activiteiten]);
    }
}