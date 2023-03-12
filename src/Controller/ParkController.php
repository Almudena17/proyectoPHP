<?php

namespace App\Controller;

use App\Entity\District;
use App\Entity\Park;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParkController extends AbstractController {

    #[Route("/park/{id}", name:"showPark")]
    public function showPark(EntityManagerInterface $doctrine, $id) {
        $repository = $doctrine -> getRepository(Park::class);
        $park = $repository -> find($id);
        return $this -> render("parks/showPark.html.twig", ["park" => $park]);
    }

    #[Route("/parks", name: "listPark")]
    public function listParks(EntityManagerInterface $doctrine) {
        $repository = $doctrine -> getRepository(Park::class);
        $parks = $repository -> findAll();        
        return $this -> render ("parks/listPark.html.twig", ["parks" => $parks]);
    }

    #[Route("/new/park")]
    public function newPark(EntityManagerInterface $doctrine) {
        $park1 = new Park();
        $park1 -> setName("Parque Emir Mohamed I");
        $park1 -> setDescription("Este espacio pretende recordar el pasado de la diversidad de culturas que existió en la ciudad de Madrid. Se caracteriza por tener un estilo andalusí.");
        $park1 -> setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Parque_del_Emir_Mohamed_I_%28Madrid%29_04.jpg/410px-Parque_del_Emir_Mohamed_I_%28Madrid%29_04.jpg");
        $park1 -> setArea("3.828 metros cuadrados");
        $park1 -> setAge("1986");

        $park2 = new Park();
        $park2 -> setName("Parque Atenas");
        $park2 -> setDescription("Es un espacio con gran diversidad vegetal: acacias del japón, acacias de tres espinas, castaños de indias y olmos entre otros. Este parque es de los más grandes del distrito Centro.");
        $park2 -> setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Madrid_GDFL040412_006.jpg/410px-Madrid_GDFL040412_006.jpg");
        $park2 -> setArea("4,66 hectáreas");
        $park2 -> setAge("1971");

        $park3 = new Park();
        $park3 -> setName("Jardines del Descubrimiento");
        $park3 -> setDescription("También conocido como la Plaza de Colón. Las especies arbóreas que se observan son piños piñoneros, olivos, laureles, ciruelos rojos, cipreses, etc.");
        $park3 -> setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Plaza_de_Col%C3%B3n_%28Madrid%29_06.jpg/410px-Plaza_de_Col%C3%B3n_%28Madrid%29_06.jpg");
        $park3 -> setArea("2,02 hectáreas");
        $park3 -> setAge("1970");

        $park4 = new Park();
        $park4 -> setName("Parque de Breogán");
        $park4 -> setDescription("Prácticamente la totalidad del parque está formado por un gran terrizo en el que existen algunas zonas de pradera");
        $park4 -> setImage("https://upload.wikimedia.org/wikipedia/commons/b/b2/Parque_de_Berl%C3%ADn_01.jpg");
        $park4 -> setArea("2,22 hectáreas");
        $park4 -> setAge("1985");

        $park5 = new Park();
        $park5 -> setName("Parque de Enrique Herreros");
        $park5 -> setDescription("Tiene forma cuadrangular y, aunque de tamaño es reducido, alberga diferentes servicios, como una zona infantil, una zona de petanca y pistas deportivas de pádel.");
        $park5 -> setImage("https://1.bp.blogspot.com/-AwhnAGbguZw/X6wmqBmkdCI/AAAAAAAA9NI/QPnMUz79WNMNIrrv2TlcsrLVjxf8PxUUgCLcBGAsYHQ/s0/0102.jpg");
        $park5 -> setArea("6.665 metros cuadrados");
        $park5 -> setAge("1993");

        $park6 = new Park();
        $park6 -> setName("Parque de Santander");
        $park6 -> setDescription("Se concibió como una superficie en la que se prescinde de praderas y céspedes para fomentar el ahorro del agua. La vegetación existente es de bajo consumo de agua.");
        $park6 -> setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Luz_verde_a_la_demolici%C3%B3n_del_campo_de_golf_01.jpg/330px-Luz_verde_a_la_demolici%C3%B3n_del_campo_de_golf_01.jpg");
        $park6 -> setArea("11,90 hectáreas");
        $park6 -> setAge("2007");

        $park7 = new Park();
        $park7 -> setName("Parque del Payaso Fofó");
        $park7 -> setDescription("Sobre el terreno existe arbolado variado, bajo el que aparece una cubierta de pradera alternada con diferentes macizos arbustivos.");
        $park7 -> setImage("https://patrimonioypaisaje.madrid.es/FWProjects/monumenta/Monumentos/8571/mon2_8571_05_MEDIANA.jpg");
        $park7 -> setArea("7,68 hectáreas");
        $park7 -> setAge("1993");

        $park8 = new Park();
        $park8 -> setName("Parque de Entrevías");
        $park8 -> setDescription("Por su conformación sinuosa todos sus paseos de terrizo se amoldan a una forma curva. Alberga una lámina de agua a modo de estanque con forma irregular.");
        $park8 -> setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/29_Parque_forestal_Entrev%C3%ADas.jpg/410px-29_Parque_forestal_Entrev%C3%ADas.jpg");
        $park8 -> setArea("12,18 hectáreas");
        $park8 -> setAge("1972");

        $district1 = new District();
        $district1 -> setName("Centro");

        $district2 = new District();
        $district2 -> setName("Salamanca");

        $district3 = new District();
        $district3 -> setName("Chamberí");

        $district4 = new District();
        $district4 -> setName("Puente de Vallecas");

        $park1 -> addDistrict($district1);
        $park2 -> addDistrict($district1);
        $park3 -> addDistrict($district2);
        $park4 -> addDistrict($district2);
        $park5 -> addDistrict($district3);
        $park6 -> addDistrict($district3);
        $park7 -> addDistrict($district4);
        $park8 -> addDistrict($district4);

        $doctrine -> persist($park1);
        $doctrine -> persist($park2);
        $doctrine -> persist($park3);
        $doctrine -> persist($park4);
        $doctrine -> persist($park5);
        $doctrine -> persist($park6);
        $doctrine -> persist($park7);
        $doctrine -> persist($park8);

        $doctrine -> persist($district1);
        $doctrine -> persist($district2);
        $doctrine -> persist($district3);
        $doctrine -> persist($district4);

        $doctrine -> flush();

        return new Response("Los parques se han insertado correctamente");

    }
}