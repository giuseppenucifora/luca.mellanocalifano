<?php

namespace App\Service;

use App\Entity\Contact;

use Doctrine\ORM\EntityManagerInterface;

class ContactService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @param Contact $contact
     * @return bool
     * @throws \Exception
     */
    public function registerContact(Contact $contact)
    {
        try {
            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            return true;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}