<?php
/**
 * Created by PhpStorm.
 * User: Y520-I7-1TR-4G
 * Date: 27/11/2018
 * Time: 00:35
 */

namespace HebergementBundle\Repository;


class HebergementRepositery extends \Doctrine\ORM\EntityRepository
{
    public function afficheReservationHebergement($id)
    {

        $qd = $this->getEntityManager()
            ->createQuery("SELECT v FROM HebergementBundle:ReservationHebergement v WHERE v.idhebergement=$id");
        return $qd ->getArrayResult();

    }

    public function supprimerreservAction($id){
        $qd = $this->getEntityManager()
            ->createQuery("DELETE v FROM HebergementBundle:ReservationHebergement v WHERE v.idhebergement=$id");
        return $qd ->getArrayResult();
    }
    public function supres($dest){
        $query= $this->getEntityManager()->createQuery("SELECT v FROM HebergementBundle:hebergement v WHERE v.idagence  =:id")
            ->setParameter('id', $dest);


        return $query->getResult();
    }
    public function supress($dest){
        $query= $this->getEntityManager()->createQuery("SELECT v FROM HebergementBundle:reservationhebergement v WHERE v.idutilisateur  =:id")
            ->setParameter('id', $dest);


        return $query->getResult();
    }

}