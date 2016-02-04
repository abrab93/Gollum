<?php

namespace bean\beanBundle\Entity;

/**
 * CompteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CompteRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * @param Compte $compte
     */
    public function save(Compte $compte)
    {
        $this->_em->persist($compte);
        $this->_em->flush();
    }

    /**
     * @param $id
     * @return Compte|null
     */
    public function findCompte($id)
    {
        $compte = new Compte();
        $compte = $this->find($id);
        return $compte;
    }

    public function update(Compte $compte)
    {
        $this->_em->merge($compte);
        $this->_em->flush();
    }

    public function removeCompteWithOps(Compte $compte)
    {
        $operationRepository = $this->_em->getRepository("beanBundle:Operation");
        $operationRepository->removeOperationByCompte($compte->getId());
        $this->_em->remove($compte);
        $this->_em->flush();
    }

}