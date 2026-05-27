<?php

namespace Deg540\CleanCodeKata9;

class ListaDeLaCompra
{
    private array $listaDeLaCompra = [];

    public function instruccion(string $instruccion): string{
        $partes = explode(" ", $instruccion);
        $accion = $partes[0];
        $nombre = isset($partes[1]) ? strtolower($partes[1]) : null;



        if($accion === "añadir"){$cantidad = isset($partes[2]) ? (int)$partes[2] : 1;; $this->añadir($nombre,$cantidad);}
        if($accion === "eliminar"){return $this->eliminar($nombre);}
        if($accion === "vaciar"){$this->vaciar();}

        return $this->listar();
    }

    private function añadir(string $nombre, int $cantidad): void{
        $this->listaDeLaCompra[$nombre] = ($this->listaDeLaCompra[$nombre] ?? 0) + $cantidad;
    }

    private function eliminar(string $nombre):string{
        if (!array_key_exists($nombre, $this->listaDeLaCompra)) {
            return "El producto seleccionado no existe";
        }
        unset($this->listaDeLaCompra[$nombre]);
        return $this->listar();
    }

    private function vaciar():void{
        $this->listaDeLaCompra = [];
    }

    private function listar():string{
        return implode(", ", array_map(
            fn($n, $c) => "$n x$c",
            array_keys($this->listaDeLaCompra),
            $this->listaDeLaCompra
        ));
    }

}