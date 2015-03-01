<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Comment Entity
 */
class Comments extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 20;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $posts = $manager->getRepository('ModelBundle:Post')->findAll();

        $comments = array(
            0 => 'Duis ullamcorper eget augue nec interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate erat lectus, vitae rhoncus est mattis at. Integer non felis vitae ligula rutrum tincidunt ut id mauris. Duis in urna ac sem egestas lacinia. Aliquam erat volutpat. Etiam a neque ac nibh vulputate pretium a id massa. Pellentesque non velit eget turpis tristique imperdiet quis a ligula.',
            1 => 'Sed vel varius lorem. Ut dictum dignissim enim a dictum. Cras sollicitudin erat non magna tempor, et hendrerit arcu euismod. Duis eros lacus, imperdiet at justo efficitur, fermentum aliquam sapien. Nunc egestas libero nec rutrum sollicitudin. Morbi eget arcu vitae tortor semper imperdiet.',
            2 => 'Aliquam ut nulla sed purus facilisis ultricies at vel turpis. Aenean tincidunt condimentum enim. Sed commodo scelerisque diam sit amet gravida. Suspendisse potenti. In lacinia vehicula sapien, eu lobortis tortor. Ut blandit id risus quis vulputate. Vivamus vitae fringilla odio.'
        );

        $i = 0;

        foreach ($posts as $post) {
            $comment = new Comment();
            $comment->setAuthorName('Someone');
            $comment->setBody($comments[$i++]);
            $comment->setPost($post);

            $manager->persist($comment);
        }

        $manager->flush();
    }
}