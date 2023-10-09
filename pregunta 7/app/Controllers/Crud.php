<?php namespace App\Controllers;

	use App\Models\CrudModel;

class Crud extends BaseController
{
	public function index()
	{
		$Crud = new CrudModel();
		$datos = $Crud->listarNombres();

		$mensaje = session('mensaje');

		$data = [
					"datos" => $datos,
					"mensaje" => $mensaje
				];

		return view('listado', $data);
	}

	public function crear() {
		$datos = [
					"ci" => $_POST['ci'],
					"nombre" => $_POST['nombre'],
					"paterno" => $_POST['paterno'],
					"contrasenia" => "pswd000"
				];
		$datos2 = [
					"ci_alumno" => $_POST['ci'],
					"idmat" => "MAT001",
					"depto" => "-",
					"promedio" => 0
				];
		$Crud = new CrudModel();
		$respuesta = $Crud->insertar($datos,$datos2);

		if ($respuesta > 0) {
			return redirect()->to(base_url().'/')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','0');
		}

	}

	public function actualizar(){
		$datos = [
					"nombre" => $_POST['nombre'],
					"paterno" => $_POST['paterno']
				];
		$ci = $_POST['ci'];

		$Crud = new CrudModel();

		$respuesta = $Crud->actualizar($datos, $ci);

		if ($respuesta) {
			return redirect()->to(base_url().'/')->with('mensaje','2');
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','3');
		}
	}

	public function obtenerNombre($ci) {
		$data = ["ci" => $ci];
		$Crud = new CrudModel();
		$respuesta = $Crud->obtenerNombre($data);

		$datos = ["datos" => $respuesta];

		return view('actualizar', $datos);
	}

	public function eliminar($ci){
		$Crud = new CrudModel();
		$data = ["ci" => $ci];
		$data2 = ["ci_alumno" => $ci];

		$respuesta = $Crud->eliminar($data,$data2);

		if ($respuesta) {
			return redirect()->to(base_url().'/')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','5');
		}
	}

	//--------------------------------------------------------------------

}