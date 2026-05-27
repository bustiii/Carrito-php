<?php

namespace Deg540\CleanCodeKata9\Test;

use Deg540\CleanCodeKata9\ListaDeLaCompra;
use PHPUnit\Framework\TestCase;

class ListaDeLaCompraTest extends TestCase
{
    private ListaDeLaCompra $lista;
    protected function setUp(): void{
        $this->lista = new ListaDeLaCompra();
    }
    /**
     * @test
     */
    public function anadirProductoDevuelveUno()
    {
        $res = $this->lista->instruccion("añadir pan");

        $this->assertEquals("pan x1", $res);
    }

    /**
     * @test
     */
    public function anadirProductoConCantidadDevuelveCantidad(){
        $res = $this->lista->instruccion("añadir pan 3");

        $this->assertEquals("pan x3", $res);

    }

    /**
     * @test
     */
    public function anadirConMayusculaNoInfluye()
    {

        $res = $this->lista->instruccion("añadir Pan 3");

        $this->assertEquals("pan x3", $res);
    }

    /**
     * @test
     */
    public function eliminarProductoLoBorraDeLaLista()
    {
        $this->lista->instruccion("añadir pan");
        $res = $this->lista->instruccion("eliminar pan");

        $this->assertEquals("", $res);

    }

    /**
     * @test
     */
    public function eliminarProductoNoExistenteDevuelveAviso()
    {
        $this->lista->instruccion("añadir leche");
        $res = $this->lista->instruccion("eliminar pan");

        $this->assertEquals("El producto seleccionado no existe", $res);

    }

    /**
     * @test
     */
    public function vaciarCarritoCuandoInstruccionEsVaciar()
    {
        $this->lista->instruccion("añadir leche");
        $this->lista->instruccion("añadir Pan 3");
        $res = $this->lista->instruccion("vaciar");

        $this->assertEquals("", $res);

    }

    /**
     * @test
     */
    public function añadirElementoYaExistenteSumaCantidad()
    {
        $this->lista->instruccion("añadir pan 2");
        $res = $this->lista->instruccion("añadir pan 3");

        $this->assertEquals("pan x5", $res);

    }




}
