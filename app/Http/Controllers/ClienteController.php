<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use App\Http\Requests\ClienteFormRequest;

class ClienteController extends Controller
{

    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository) {
        $this->clienteRepository = $clienteRepository;
    }

    public function obtenerClientes() {
        $clientes = $this->clienteRepository->obtenerClientes();
        return $clientes;
    }

    public function guardarCliente(ClienteFormRequest $request) {
        $request->validated();
        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->dni = $request->input('dni');
        $cliente->direccion = $request->input('direccion');
        if ( $this->clienteRepository->guardarOActualizarCliente($cliente) )
            return true;
        else
            return false;
    }

    public function obtenerClientePorId($id) {
        $cliente = $this->clienteRepository->obtenerClientePorId($id);
        return $cliente;
    }

    public function actualizarCliente($id, ClienteFormRequest $request) {
        $request->validated();
        $cliente = $this->clienteRepository->obtenerClientePorId($id);
        $cliente->nombre = $request->input('nombre');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->dni = $request->input('dni');
        $cliente->direccion = $request->input('direccion');
        if ( $this->clienteRepository->guardarOActualizarCliente($cliente) )
            return true;
        else
            return false;
    }

    public function eliminarCliente($id) {
        if ( $this->clienteRepository->eliminarCliente($id) )
            return true;
        else
            return false;
    }

    public function obtenerDetallesDeCliente($id) {
        $cliente = $this->clienteRepository->obtenerDetallesDeCliente($id);
        return $cliente;
    }

    public function buscarClientes($tipo, $texto) {
        $clientes = $this->clienteRepository->buscarClientes($tipo, $texto);
        return $clientes;
    }

}
