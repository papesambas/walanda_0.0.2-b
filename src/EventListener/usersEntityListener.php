<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Users;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class usersEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }
    public function prePersist(Users $users, LifecycleEventArgs $arg): void
    {
        $user = $this->Securty->getUser();
        if ($user === null) {
            $users
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setFullname($users->getNom()." ".$users->getPrenom())
            ->setSlug($this->getUsersSlug($users));
        }else{
            $users
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setFullname($users->getNom()." ".$users->getPrenom())
            ->setCreatedBy($user)
            ->setSlug($this->getUsersSlug($users));
        }
    }

    public function preUpdate(Users $users, LifecycleEventArgs $arg): void
    {
        $user = $this->Securty->getUser();
        if ($user === null) {
            $users
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setFullname($users->getNom()." ".$users->getPrenom())
            ->setSlug($this->getUsersSlug($users));
        }else{
            $users
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setFullname($users->getNom()." ".$users->getPrenom())
            ->setUpdatedBy($user)
            ->setSlug($this->getUsersSlug($users));
        }
    }

    private function getUsersSlug(Users $users): string
    {
        $slug = mb_strtolower($users->getNom() . ' ' . $users->getPrenom() . '-' . $users->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
