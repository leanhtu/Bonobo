<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionResolver\OptionResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class InscriptionForm extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $option)
	{
		$builder
		->add('userName', TextType::class)
		->add('userPassword', TextType::class)
		->add('userAge', TextType::class)
		->add('userFamille', TextType::class)
		->add('userRace', TextType::class)
		->add('userRace', TextType::class);
	}
	
}