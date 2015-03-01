<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Post Entity
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 15;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Lorem ipsum dolor sit amet');
        $p1->setBody("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lectus velit, scelerisque sed suscipit et, suscipit et nisi. Morbi sit amet tellus aliquam, blandit felis sit amet, venenatis augue. Etiam iaculis justo in enim cursus hendrerit. Vestibulum nec diam ex. Aliquam at vehicula ipsum. Nullam mi sapien, lobortis nec felis sed, commodo dapibus lorem. Nulla varius varius odio ac dignissim. Phasellus semper tempor lacus, ut tristique elit dignissim sed. Sed sed arcu lectus. Nulla libero purus, hendrerit et sem vel, maximus lobortis dolor. Nullam ante est, maximus et orci at, condimentum condimentum nibh. Morbi vel metus varius sem lobortis cursus vitae eget mi.");
        $p1->setAuthor($this->getAuthor($manager, 'David'));

        $p2 = new Post();
        $p2->setTitle('Cras ante elit');
        $p2->setBody("Cras ante elit, convallis nec quam ac, efficitur consequat nunc. Nulla nibh nibh, auctor quis fringilla id, lacinia id velit. Donec eget fringilla lectus, condimentum varius ex. Morbi euismod blandit massa non placerat. Donec et congue quam, id accumsan purus. Vestibulum venenatis maximus quam ut fringilla. Quisque sapien ligula, aliquet quis pellentesque sed, feugiat sagittis lacus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque feugiat fringilla enim nec congue. Ut et sagittis purus. Donec vulputate sapien consequat porta ultricies. Donec ullamcorper vitae orci tincidunt congue.");
        $p2->setAuthor($this->getAuthor($manager, 'David'));

        $p3 = new Post();
        $p3->setTitle('Quisque lacinia pellentesque ipsum at consequat');
        $p3->setBody("Quisque lacinia pellentesque ipsum at consequat. Vestibulum semper lorem leo, eu venenatis eros sagittis vel. Ut elementum, urna et fringilla interdum, est elit finibus arcu, vitae pulvinar leo eros non magna. Nulla accumsan sem ante, vel posuere sem molestie ac. Nunc odio mi, congue ut lectus sit amet, rhoncus dapibus metus. Nam mollis risus sed rhoncus fringilla. Cras non efficitur mauris, eu faucibus neque. Suspendisse lacinia id dolor consectetur molestie. Aenean mollis nisi vel odio porttitor auctor. Duis vel scelerisque nunc. Pellentesque tempor mi eu augue ultrices, vitae dapibus ipsum porta. Pellentesque nunc tortor, semper malesuada viverra quis, pharetra sit amet urna. Mauris sagittis mi in pretium laoreet. Sed at luctus nunc. Nullam sagittis erat sed felis ultrices, quis aliquet dui placerat.");
        $p3->setAuthor($this->getAuthor($manager, 'David'));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();
    }

    /**
     * Get an author
     *
     * @param ObjectManager $manager
     * @param string        $name
     *
     * @return Author
     */
    private function getAuthor(ObjectManager $manager, $name)
    {
        return $manager->getRepository('ModelBundle:Author')->findOneBy(
            array(
                'name' => $name
            )
        );
    }
}