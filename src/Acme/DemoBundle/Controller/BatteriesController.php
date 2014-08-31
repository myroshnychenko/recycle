<?php

namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Entity\BatteriesPack;
use Acme\DemoBundle\Form\BatteriesPackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class BatteriesController extends Controller
{
    /**
     * Put batteries in box
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newBatteryPackAction(Request $request)
    {
        $pack = new BatteriesPack();
        $pack->setDate(new \DateTime());
        $form = $this->createForm(new BatteriesPackType(), $pack);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $pack->getName() ? : $pack->setName('');
            $em = $this->getDoctrine()->getManager();
            $em->persist($pack);
            $em->flush();
            return new RedirectResponse($this->generateUrl('_statistic'));
        }

        return $this->render('AcmeDemoBundle:Batteries:batteries-pack.html.twig', ['form' => $form->createView()]);
    }

    /**
     * Show statistic
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function statisticAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT bp.type, SUM(bp.count) as amount
            FROM AcmeDemoBundle:BatteriesPack bp
            GROUP BY bp.type'
        );

        $data = $query->getResult();
        foreach ($data as $key => $value) {
            $data[$key]['typeName'] = $this->getBatteryType($value['type']);
        }


        return $this->render('AcmeDemoBundle:Batteries:statistic.html.twig', ['data' => $data]);
    }

    private static function getBatteryType($typeId)
    {
        $types = [
            '1' => 'AA',
            '2' => 'AAA',
            '3' => 'Undefined'
        ];

        return $types[$typeId];
    }
} 