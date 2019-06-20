<?php
/**
 * Created by PhpStorm.
 * User: Y520-I7-1TR-4G
 * Date: 30/11/2018
 * Time: 05:08
 */

namespace VoyageOrganiseBundle\Repository;


class VoyageOrganiseRepository extends \Doctrine\ORM\EntityRepository
{


    public function findByp($paysDestination)
    {
        {
            $query = $this->getEntityManager()
                ->createQuery("select v from VoyageOrganiseBundle:Voyageorganise v 
        where v.paysDestination LIKE :paysDestination 
        ORDER BY v.paysDestination ASC")
                ->setParameter('paysDestination', '%' . $paysDestination . '%');
            return $query->getResult();


        }
    }
    public function afficherVoyageorgAction(){
        $id = $this->getUser()->getId();
        $voyage= $this->getDoctrine()->getRepository(Voyageorganise::class)->supres($id);

        return $this->render("@VoyageOrganise/VoyageOrganise/afficheVoyageorg.html.twig",array('voyageorganise'=>$voyage));

    }
    public function supres($dest){
        $query= $this->getEntityManager()->createQuery("SELECT v FROM VoyageOrganiseBundle:voyageorganise v WHERE v.idAgence  =:ddepart")
            ->setParameter('ddepart', $dest);


        return $query->getResult();
    }
    public function supress($dest){
        $query= $this->getEntityManager()->createQuery("SELECT v FROM VoyageOrganiseBundle:reservervoyageorganise v WHERE v.idUser  =:id")
            ->setParameter('id', $dest);


        return $query->getResult();
    }
}