<?php
class ControladorProyectos
{

    public static function ctrMostrarTablaProyectos()
    {

        $respuesta = ModeloProyecto::mdlMostrarTablaProyectos();

        return $respuesta;
    }

    public static function ctrMostrarTablaProyectosDetalle($id_proyecto)
    {

        $respuesta = ModeloProyecto::mdlMostrarTablaProyectosDetalle($id_proyecto);

        return $respuesta;
    }

    public static function ctrCrearProyecto($proyecto)
    {

        $datosProyecto = array(
            "codigo"             => $proyecto["codigo"],
            "precio"          => $proyecto["precio"],
            "nombre"            => $proyecto["nombre"],
            "descripcion"             => $proyecto["descripcion"],
            "integrantes"          => $proyecto["integrantes"]
        );

        $respuesta = ModeloProyecto::mdlCrearProyecto("proyectos", $datosProyecto);

        return $respuesta;
    }

    public static function ctrBuscarProyecto($valor)
    {

        $tabla = 'proyectos';

        $respuesta = ModeloProyecto::mdlBuscarProyecto($tabla, $valor);

        return $respuesta;
    }

    public static function ctrActualizarProyecto($valor)
    {
        $tabla = 'proyectos';

        $respuesta = ModeloProyecto::mdlActualizarProyecto($tabla, $valor);

        return $respuesta;
    }

    public static function ctrActualizarEstadoProyecto($valor, $estadoP)
    {

        $tabla = 'proyectos';

        $respuesta = ModeloProyecto::mdlActualizarEstadoProyecto($tabla, $valor, $estadoP);

        return $respuesta;
    }

    public static function ctrActualizarProyectoIntegrantes($valor)
    {
        $tabla = 'proyectos';

        $respuesta = ModeloProyecto::mdlActualizarProyectoIntegrante($tabla, $valor);

        return $respuesta;
    }

    public static function ctrActualizarEstadoProyectoIntegrantes($valor, $estadoP)
    {

        $tabla = 'proyectos';

        $respuesta = ModeloProyecto::mdlActualizarEstadoProyectoIntegrante($tabla, $valor, $estadoP);

        return $respuesta;
    }
}
