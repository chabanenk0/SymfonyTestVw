<?php
namespace chab\TestTourBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use chab\TestTourBundle\Entity\Category;
use chab\TestTourBundle\Entity\City;
use chab\TestTourBundle\Entity\Tour;

class LoadUserData implements FixtureInterface
    {
        /**
         * {@inheritDoc}
         */
        public function load(ObjectManager $manager)
        {
            $category1 = new Category();
            $category1->setCategory('no category');
            $category1->setInfo('unnamed category');

            $manager->persist($category1);
            $manager->flush();

            $category2 = new Category();
            $category2->setCategory("Пешие");
            $category2->setInfo("Туры пешком по городу позволяют осмотреть все достопримечательности и сделать лучшие фотографии.");
            $manager->persist($category2);
            $manager->flush();

            $category3 = new Category();
            $category3->setCategory('Автобусные');
            $category3->setInfo('Туры на комфортабельных автобусах.');
            $manager->persist($category3);
            $manager->flush();

            $category4 = new Category();
            $category4->setCategory('Прогулки на судне');
            $category4->setInfo('Туры на речных и морских судах.');
            $manager->persist($category4);
            $manager->flush();


            $category5 = new Category();
            $category5->setCategory('Турпоход');
            $category5->setInfo('Туристические походы разных категорий.');
            $manager->persist($category5);
            $manager->flush();

            $category6 = new Category();
            $category6->setCategory('Комбинированный');
            $category6->setInfo('Комбинированные туры.');
            $manager->persist($category6);
            $manager->flush();

            $category7 = new Category();
            $category7->setCategory('Памятники');
            $category7->setInfo('Туры по памятникам города.');
            $manager->persist($category7);
            $manager->flush();

            $category8 = new Category();
            $category8->setCategory('Музеи');
            $category8->setInfo('Туры по музеям города.');
            $manager->persist($category8);
            $manager->flush();

            $category9 = new Category();
            $category9->setCategory('Самостоятельно');
            $category9->setInfo('Маршрут экскурсии готовится самостоятельно.');
            $manager->persist($category9);
            $manager->flush();

            $city1 = new City();
            $city1->setName('Киев');
            $city1->setInfo('Туры по столице Украины.');
            $manager->persist($city1);
            $manager->flush();
			$cat1id=$city1->getId();
			echo "city1 id=$cat1id<p>";

			
            $city2 = new City();
            $city2->setName('Харьков');
            $city2->setInfo('Туры по второй столице Украины - Харькову.');
            $manager->persist($city2);
            $manager->flush();

            $city3 = new City();
            $city3->setName('Львов');
            $city3->setInfo('Туры по "місту Лева".');
            $manager->persist($city3);
            $manager->flush();

            $city4 = new City();
            $city4->setName('Запоріжжя');
            $city4->setInfo('Туры по Запорожью.');
            $manager->persist($city4);
            $manager->flush();

            $city5 = new City();
            $city5->setName('Черкассы');
            $city5->setInfo('Туры в Черкассах.');
            $manager->persist($city5);
            $manager->flush();

            $city6 = new City();
            $city6->setName('Чигирин');
            $city6->setInfo('Туры в Чигирин.');
            $manager->persist($city6);
            $manager->flush();

            $city7 = new City();
            $city7->setName('Донецк');
            $city7->setInfo('Туры в Донецк.');
            $manager->persist($city7);
            $manager->flush();

            $city8 = new City();
            $city8->setName('Кривой Рог');
            $city8->setInfo('Туры в Кривой Рог.');
            $manager->persist($city8);
            $manager->flush();

            $city9 = new City();
            $city9->setName('Севастополь');
            $city9->setInfo('Туры в Севастополь.');
            $manager->persist($city9);
            $manager->flush();

            $tour1= new Tour();
            $tour1->setName('Пеший тур по лавре');
            $tour1->setCity($city1->getId());
			$tour1->setCity1($city1);
            $tour1->setCategory($category2->getId());
            $tour1->addCategorie($category2);
            $tour1->addCategorie($category7);
			$tour1->setIsPublic(1);
            $manager->persist($tour1);
            $manager->flush();


            $tour2= new Tour();
            $tour2->setName('Автобусный тур по Харькову');
            $tour2->setCity($city2->getId());
			$tour2->setCity1($city2);
            $tour2->setCategory($category3->getId());
            $tour2->addCategorie($category3);
            $tour2->addCategorie($category6);
            $tour2->addCategorie($category7);
            $tour2->addCategorie($category8);
			$tour2->setIsPublic(1);
            $manager->persist($tour2);
            $manager->flush();

            $tour3= new Tour();
            $tour3->setName('Автобусный тур по Львову');
            $tour3->setCity($city3->getId());
			$tour3->setCity1($city3);
            $tour3->setCategory($category3->getId());
            $tour3->addCategorie($category3);
            $tour3->addCategorie($category6);
            $tour3->addCategorie($category7);
            $tour3->addCategorie($category8);
			$tour3->setIsPublic(1);
            $manager->persist($tour3);
            $manager->flush();

            $tour4= new Tour();
            $tour4->setName('Автобусный тур по Запорожью');
            $tour4->setCity($city4->getId());
			$tour4->setCity1($city4);
            $tour4->setCategory($category3->getId());
            $tour4->addCategorie($category3);
            $tour4->addCategorie($category7);
			$tour4->setIsPublic(1);
            $manager->persist($tour4);
            $manager->flush();

            $tour5= new Tour();
            $tour5->setName('Пеший тур по Черкассах');
            $tour5->setCity($city5->getId());
			$tour5->setCity1($city5);
            $tour5->setCategory($category2->getId());
            $tour5->addCategorie($category2);
            $tour5->addCategorie($category7);
            $tour5->addCategorie($category8);
			$tour5->setIsPublic(1);
            $manager->persist($tour5);
            $manager->flush();

            $tour6= new Tour();
            $tour6->setName('Автобусный тур в Чигирин');
            $tour6->setCity($city6->getId());
			$tour6->setCity1($city6);
            $tour6->setCategory($category3->getId());
            $tour6->addCategorie($category3);
            $tour6->addCategorie($category7);
			$tour6->setIsPublic(1);
            $manager->persist($tour6);
            $manager->flush();

            $tour7= new Tour();
            $tour7->setName('Автобусный тур в Донецк');
            $tour7->setCity($city7->getId());
			$tour7->setCity1($city7);
            $tour7->setCategory($category3->getId());
            $tour7->addCategorie($category3);
            $tour7->addCategorie($category7);
			$tour7->setIsPublic(1);
            $manager->persist($tour7);
            $manager->flush();

            $tour8= new Tour();
            $tour8->setName('Автобусный тур в Донецк');
            $tour8->setCity($city8->getId());
			$tour8->setCity1($city8);
            $tour8->setCategory($category3->getId());
            $tour8->addCategorie($category3);
            $tour8->addCategorie($category7);
			$tour8->setIsPublic(1);
            $manager->persist($tour8);
            $manager->flush();

            $tour9= new Tour();
            $tour9->setName('Тур по побережью Севастополя');
            $tour9->setCity($city9->getId());
			$tour9->setCity1($city9);
            $tour9->setCategory($category4->getId());
            $tour9->addCategorie($category4);
            $tour9->addCategorie($category7);
			$tour9->setIsPublic(1);
            $manager->persist($tour9);
            $manager->flush();

        }
    }

?>