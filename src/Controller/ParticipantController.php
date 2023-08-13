<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ParticipantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ParticipantController extends AbstractController
{
    #[Route('/profil/edition/{id}', name: 'app_profil_edition')]
    public function edit(Participant $participant, Request $request,UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {

        if($this->getUser() !== $participant){
            return $this->redirectToRoute('app_home');
        }

        $form = $this->createForm(ParticipantType::class, $participant);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $plainPassword = $form->get('password')->getData();
            if ($plainPassword) {
                $hashedPassword = $passwordHasher->hashPassword($participant, $plainPassword);
                $participant->setPassword($hashedPassword);
            }
           

            $entityManager->persist($participant);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }


        return $this->render('participant/edit.html.twig', [
            'participantForm' => $form->createView(),
        ]);
    }
}
