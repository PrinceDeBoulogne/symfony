<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Form\ArtisteType;
use App\Repository\ArtisteRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/artiste")
 */
class ArtisteController extends AbstractController
{
    /**
     * @Route("/", name="artiste_index", methods={"GET"})
     */
    public function index(ArtisteRepository $artisteRepository): Response
    {
        return $this->render('artiste/index.html.twig', [
            'artistes' => $artisteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="artiste_new", methods={"GET","POST"})
     */
    public function new(Request $request, $artiste, FileUploader $fileUploader): Response
    {
        $artiste = new Artiste();
        $form = $this->createForm(ArtisteType::class, $artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $this->addImage($form, $artiste, $fileUploader);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($artiste);
            $entityManager->flush();

            return $this->redirectToRoute('artiste_index');
        }

        return $this->render('artiste/new.html.twig', [
            'artiste' => $artiste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="artiste_show", methods={"GET"})
     */
    public function show(Artiste $artiste): Response
    {
        return $this->render('artiste/show.html.twig', [
            'artiste' => $artiste,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="artiste_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Artiste $artiste, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(ArtisteType::class, $artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addImage($form, $artiste, $fileUploader);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artiste_index');
        }

        return $this->render('artiste/edit.html.twig', [
            'artiste' => $artiste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="artiste_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Artiste $artiste): Response
    {
        if ($this->isCsrfTokenValid('delete'.$artiste->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($artiste);
            $entityManager->flush();
        }

        return $this->redirectToRoute('artiste_index');
    }

    public function addImage($form, $artiste, FileUploader $fileUploader)
    {
        /** @var UploadedFile $brochureFile */
        $brochureFile = $form['image']->getData();
        if ($brochureFile) {
            $brochureFileName = $fileUploader->upload($brochureFile);
            $artiste->setImage("/Img/$brochureFileName");
        }
    }


    /**
     * @Route("/search", name="artiste_found", methods={"POST"})
     * @param Request $request
     * @param ArtisteRepository $rep
     * @return Response
     */
    public function searchArtist(Request $request, ArtisteRepository $rep): Response
    {
        if($rep == true) {
            $artisteNom = $request->request->get('artisteNom');
            $artiste = $rep->findOneBy(['nom' => $artisteNom]);
            return $this->render('artiste/show.html.twig', [
                'artiste' => $artiste,
            ]);
        }
        else{
            echo "SORRY NOT A GOOD ARTISTE";
        }
    }
}
