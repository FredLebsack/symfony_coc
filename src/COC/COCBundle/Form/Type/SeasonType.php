<?php

namespace COC\COCBundle\Form\Type;

use COC\COCBundle\Entity\Clan;
use COC\COCBundle\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\EntityRepository;

class SeasonType extends AbstractType
{
    protected $season ;
    protected $actualSeason ;


    protected $clan;

    public function __construct (Clan $clan, Season  $actualSeason, $selectedEntity = null)
    {

        $this->clan = $clan;
        $this->actualSeason = $actualSeason;
        $this->selectedEntity  = $selectedEntity ;


    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $now = new \DateTime();
        $builder
            ->add('season', 'entity', array (   'label' => 'label.previous_seasons',
                                                'class' => 'COC\COCBundle\Entity\Season',
                                                'property' => 'name',


                                                'query_builder' => function(EntityRepository $er) use ($options) {
                                                return $er->createQueryBuilder('saison')
                                                    ->where('saison.end >= :created')
                                                    ->andWhere('saison.end <= :actualSeason')
                                                    ->orderBy('saison.start', 'ASC')
                                                    ->setParameter('created', $this->clan->getCreated())
                                                    ->setParameter('actualSeason', $this->actualSeason->getStart())
                                                    ;
                                            }, ))
            ->add('save', 'submit', array('label' => 'label.search'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\Season',
            'empty_data' => function(FormInterface $form) {
                $data = $form->get('name')->getData();
                return new Season($data);
            }
        ));
    }


    public function getName()
    {
        return 'season';
    }
}