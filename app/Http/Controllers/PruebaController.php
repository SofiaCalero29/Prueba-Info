<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Hash;

class PruebaController extends Controller
{
    public function index()
    {
        $datos = DB::select('select * from registro');

        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request)
    {
        try {
            $sql = DB::insert("INSERT INTO registro(nombre, apellido, email, telefono, fecha_nac, categoria, contra) values(?,?,?,?,?,?,?)", [
                $request->txtNombre,
                $request->txtApellido,
                $request->txtEmail,
                $request->txtTelefono,
                $request->txtFecha,
                $request->Cate,
                hash::make($request->txtPassword1),
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("Correcto", "Visitante Registrado Correctamente");
        } else {
            return back()->with("Incorrecto", "Error al registrar");
        }
    }

    public function update(Request $request)
    {
        try {
            $sql = DB::update("UPDATE registro set nombre=?, apellido=?, email=?, telefono=?, fecha_nac=?, categoria=?, contra=? WHERE idVisi=?", [
                $request->txtNombre,
                $request->txtApellido,
                $request->txtEmail,
                $request->txtTelefono,
                $request->txtFecha,
                $request->Cate,
                $request->txtPassword1,
                $request->txtidVisi,
            ]);

            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("Correcto", "Visitante Modificado Correctamente");
        } else {
            return back()->with("Incorrecto", "Error al Modificar");
        }
    }

    public function delete($idVisi) {
        try {
            $sql = DB::delete("DELETE FROM registro WHERE idVisi = $idVisi");
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("Correcto", "Visitante Eliminado Correctamente");
        } else {
            return back()->with("Incorrecto", "Error al Eliminar");
        }

    }
}
