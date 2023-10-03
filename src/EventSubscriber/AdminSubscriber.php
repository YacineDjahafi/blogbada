<?php
namespace App\EventSubscriber;

use App\TimestampedInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
    // Cette classe sert à déclencher un evenement avant que l'entité ne soit enregistrer dans la DB
class AdminSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => ['setEntityCreatedAt'],
            BeforeEntityUpdatedEvent::class => ['setEntityUpdatedAt']
        ];
    }

    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();
        // TimestampedInterface va implémenter les entités avec une date de création et/ou une date de mise à jour
        if (!$entity instanceof TimestampedInterface) {
            return;
        }

        $entity->setCreatedAt(new \DateTimeImmutable());
    }


    public function setEntityUpdatedAt(BeforeEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof TimestampedInterface) {
            return;
        }

        $entity->setUpdatedAt(new \DateTimeImmutable());
    }
}