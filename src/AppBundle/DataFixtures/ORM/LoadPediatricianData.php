<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Address;
use AppBundle\Entity\Pediatrician;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadPediatricianData
    extends AbstractFixture
    implements ORMFixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $pediatre = new Pediatrician();
        $pediatre->setName('Dr Mostfa Hamdi');
        $adrs = new Address();
        $adrs->setRue('test');
        $adrs->setLongitude('36.8179854');
        $adrs->setLatitude('10.1946025');
        $adrs->setGovernorate('tunis');
        $pediatre->setAddress($adrs);
        $pediatre->setPrice(40);

        //$pediatre->setRating(1);
        $manager->persist($pediatre);


        $manager->flush();
    }

    /**
     * Sets the container.
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 5;
    }

}