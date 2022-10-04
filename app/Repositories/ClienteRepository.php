<?php

namespace App\Repositories;

use App\Models\Cliente;

class ClienteRepository {

    public function obtenerClientes() {
        try {
            $clientes = Cliente::orderBy('dni', 'asc')->get();
            return $clientes;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function guardarOActualizarCliente(Cliente $cliente) {
        try {
            $cliente->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function obtenerClientePorId($id) {
        try {
            $cliente = Cliente::find($id);
            return $cliente;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function eliminarCliente($id) {
        try {
            Cliente::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function obtenerDetallesDeCliente($id) {
        try {
            $cliente = Cliente::where('id', $id)->first();
            return $cliente;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function buscarClientes($tipo, $texto) {
        try {
            $clientes = Cliente::where($tipo,'LIKE','%'.$texto.'%')->get();
            return $clientes;
        } catch (\Throwable $th) {
            return null;
        }
    }

}
