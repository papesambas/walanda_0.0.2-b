<?php

namespace App\EventListener;

use LogicException;
use App\Entity\LieuNaissance;
use App\Entity\LieuNaissances;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class lieuNaissancesEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(LieuNaissances $lieu, LifecycleEventArgs $arg): void
    {
        $user = $this->Securty->getUser();
        if ($user === null) {
            $lieu
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($lieu));
        }else{
            $lieu
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setCreatedBy($user)
            ->setSlug($this->getClassesSlug($lieu));

        }
    }

    public function preUpdate(LieuNaissances $lieu, LifecycleEventArgs $arg): void
    {
        $user = $this->Securty->getUser();
        if ($user === null) {
            $lieu
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($lieu));
        }else{
            $lieu
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setUpdatedBy($user)
            ->setSlug($this->getClassesSlug($lieu));

        }
    }


    private function getClassesSlug(LieuNaissances $lieu): string
    {
        $slug = mb_strtolower($lieu->getDesignation() . '-' . $lieu->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
