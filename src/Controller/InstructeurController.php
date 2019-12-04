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

class InstructeurController extends AbstractController
{
//    /**
//     * @Route("/lesson", name="lesson")
//     */
//    public function new(Request $request)
//    {
//        // creates a task object and initializes some data for this example
//        $lesson = new Lesson();
//
//        $form = $this->createForm(ActiviteitType::class, $lesson);
//
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            // $form->getData() holds the submitted values
//            // but, the original `$task` variable has also been updated
//            $lesson = $form->getData();
//
//            // ... perform some action, such as saving the task to the database
//            // for example, if Task is a Doctrine entity, save it!
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($lesson);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('lesson');
//        }
//        // ...
//        return $this->render('directeur/form.html.twig', [
//            'form' => $form->createView(),
//        ]);
//    }

    /**
     * @Route("/kalender")
     */
    public function show()
    {
        $lesson = $this->getDoctrine()
            ->getRepository(Lesson::class)
            ->findAll();

        if (!$lesson) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this ->render("directeur/Kalenderpage.html.twig", ['lesson'=>$lesson]);


        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}