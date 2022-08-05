<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    //    
    function preguntauno(Request $req)
    {
        $numero = $req->numero;
        $numeros = [0, 1];
        for ($i = 2; $i <= $numero; $i++) {
            $numeros[$i] = $numeros[$i - 2] + $numeros[$i - 1];
        }

        return $numeros;
    }

    function preguntados(Request $req)
    {
        $palabra = $req->palabra;
        $palabra_alrevez = '';
        for ($i = strlen($palabra); $i >= 0; $i--) {
            $palabra_alrevez .= substr($palabra, $i, 1);
        }

        return $palabra_alrevez;
    }

    function preguntatres(Request $req)
    {
        $numerouno = $req->numerouno;
        $numerodos = $req->numerodos;
        $resultado = 0;

        for ($i = 1; $i <= $numerouno; $i++) {
            $resultado += $numerodos;
        }

        return $resultado;
    }

    function preguntacuatro()
    {
        $devolucion = [];
        $arregloNumeros = [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,
            29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51,
            52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74,
            75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97,
            98, 99, 100
        ];

        foreach ($arregloNumeros as $key) {
            # code...
            if($this->esPrimo($key)){
                array_push($devolucion, $key);
            }
        }
        return $devolucion;
    }

    function esPrimo($numero)
    {        
        for ($i = 2; $i < $numero; $i++) {

            if (($numero % $i) == 0) {

                // No es primo 🙁
                return false;
            }
        }

        // Es primo 🙂
        return true;
    }
}
