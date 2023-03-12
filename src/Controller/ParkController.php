<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParkController extends AbstractController {

    #[Route("/park")]
    public function showPark() {
        $park = [
            "name" => "Parque Emir Mohamed I",
            "description" => "Este espacio pretende recordar el pasado de la diversidad de culturas que existió en la ciudad de Madrid. Se caracteriza por tener un estilo andalusí.",
            "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Parque_del_Emir_Mohamed_I_%28Madrid%29_04.jpg/410px-Parque_del_Emir_Mohamed_I_%28Madrid%29_04.jpg",
            "area" => "3.828 metros cuadrados",
            "age" => "1986"
        ];
        
        return $this -> render("parks/showPark.html.twig", ["park" => $park]);
    }

    #[Route("/parks")]
    public function listParks() {
        $parks = [
        [
            "name" => "Parque Emir Mohamed I",
            "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Parque_del_Emir_Mohamed_I_%28Madrid%29_04.jpg/410px-Parque_del_Emir_Mohamed_I_%28Madrid%29_04.jpg",
            "area" => "3.828 metros cuadrados",
            "age" => "1986",
            "description" => "Este espacio pretende recordar el pasado de la diversidad de culturas que existió en la ciudad de Madrid. Se caracteriza por tener un estilo andalusí."
        ],
        [
            "name" => "Parque Atenas",
            "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Madrid_GDFL040412_006.jpg/410px-Madrid_GDFL040412_006.jpg",
            "area" => "4,66 hectáreas",
            "age" => "1971",
            "description" => "Es un espacio con gran diversidad vegetal: acacias del japón, acacias de tres espinas, castaños de indias y olmos entre otros. Este parque es de los más grandes del distrito Centro."
        ],
        [
            "name" => "Jardines del Descubrimiento",
            "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Plaza_de_Col%C3%B3n_%28Madrid%29_06.jpg/410px-Plaza_de_Col%C3%B3n_%28Madrid%29_06.jpg",
            "area" => "2,02 hectáreas",
            "age" => "1970",
            "description" => "También conocido como la Plaza de Colón. Las especies arbóreas que se observan son piños piñoneros, olivos, laureles, ciruelos rojos, cipreses, etc."
        ],
        [
            "name" => "Parque de Breogán",
            "image" => "https://upload.wikimedia.org/wikipedia/commons/b/b2/Parque_de_Berl%C3%ADn_01.jpg",
            "area" => "2,22 hectáreas",
            "age" => "1982",
            "description" => "Prácticamente la totalidad del parque está formado por un gran terrizo en el que existen algunas zonas de pradera."
        ],
        [
            "name" => "Parque de Enrique Herreros",
            "image" => "https://1.bp.blogspot.com/-AwhnAGbguZw/X6wmqBmkdCI/AAAAAAAA9NI/QPnMUz79WNMNIrrv2TlcsrLVjxf8PxUUgCLcBGAsYHQ/s0/0102.jpg",
            "area" => "6.665 metros cuadrados",
            "age" => "1993",
            "description" => "Tiene forma cuadrangular y, aunque de tamaño es reducido, alberga diferentes servicios, como una zona infantil, una zona de petanca y pistas deportivas de pádel."
        ],
        [
            "name" => "Parque de Santander",
            "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Luz_verde_a_la_demolici%C3%B3n_del_campo_de_golf_01.jpg/330px-Luz_verde_a_la_demolici%C3%B3n_del_campo_de_golf_01.jpg",
            "area" => "11,90 hectáreas",
            "age" => "2007",
            "description" => "Se concibió como una superficie en la que se prescinde de praderas y céspedes para fomentar el ahorro del agua. La vegetación existente es de bajo consumo de agua."
        ],
        [
            "name" => "Parque del Payaso Fofó",
            "image" => "https://patrimonioypaisaje.madrid.es/FWProjects/monumenta/Monumentos/8571/mon2_8571_05_MEDIANA.jpg",
            "area" => "7,68 hectáreas",
            "age" => "1993",
            "description" => "Sobre el terreno existe arbolado variado, bajo el que aparece una cubierta de pradera alternada con diferentes macizos arbustivos."
        ],
        [
            "name" => "Parque de Entrevías",
            "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/29_Parque_forestal_Entrev%C3%ADas.jpg/410px-29_Parque_forestal_Entrev%C3%ADas.jpg",
            "area" => "12,18 hectáreas",
            "age" => "1972",
            "description" => "Por su conformación sinuosa todos sus paseos de terrizo se amoldan a una forma curva. Alberga una lámina de agua a modo de estanque con forma irregular."
        ]];
        return $this -> render ("listPark.html.twig", ["parks" => $parks]);
    }
}