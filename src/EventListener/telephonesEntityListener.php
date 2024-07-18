<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Telephones;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class telephonesEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Telephones $telephones, LifecycleEventArgs $arg): void
    {
        $user = $this->Securty->getUser();
        if ($user === null) {
            $telephones
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($telephones));
        }else{
            $telephones
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setCreatedBy($user)
            ->setSlug($this->getClassesSlug($telephones));
        }
    }

    public function preUpdate(Telephones $telephones, LifecycleEventArgs $arg): void
    {
        $user = $this->Securty->getUser();
        if ($user === null) {
            $telephones
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($telephones));
        }else{
            $telephones
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setUpdatedBy($user)
            ->setSlug($this->getClassesSlug($telephones));
        }
    }


    private function getClassesSlug(Telephones $telephones): string
    {
        $slug = mb_strtolower($telephones->getNumero() . '-' . $telephones->getId(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
