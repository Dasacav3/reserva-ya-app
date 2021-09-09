<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;
class Reporte extends Controller
{

    private $insumos;
    private $clientes;
    private $reservas;
    private $fechaInicio;
    private $fechaFin;
    private $date;

    public function __construct()
    {
        parent::__construct();
    }

    public function generarReporte()
    {
        $today = date('Y-m-d h:i:s A');
        $codigo = strtotime($today);
        $strToday = settype($today, "string");

        if (isset($_POST['reservas'])) {
            $this->fechaInicio = $_POST['fecha_inicio'];
            $this->fechaFin = $_POST['fecha_final'];
            $this->reservas = $_POST['reservas'];
            $reservasData = $this->model->reporteReservas(['fecha_inicio' => $this->fechaInicio, 'fecha_final' => $this->fechaFin]);
        } else if (isset($_POST['insumos'])) {
            $this->insumos = $_POST['insumos'];
            $this->fechaInicio = $_POST['fecha_inicio'];
            $this->fechaFin = $_POST['fecha_final'];
            $insumosData = $this->model->reporteInsumos(['fecha_inicio' => $this->fechaInicio, 'fecha_final' => $this->fechaFin]);
        } else if (isset($_POST['cliente'])) {
            $this->clientes = $_POST['cliente'];
            $clientesData = $this->model->reporteCliente($this->clientes);
        }

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => [279, 216],
            'orientation' => 'L'
        ]);


        if (isset($this->insumos)) {
            $plantillaInsumo =  $this->model->plantillaInsumos(['listadoInsumos' => $insumosData['listadoInsumos'], 'valorInsumos' => $insumosData['valorInsumos']], $this->fechaFin, $this->fechaInicio, $today);
        } else if (isset($this->reservas)) {
            $plantillaReserva = $this->model->plantillaReservas(['reservas' => $reservasData['reservas'], 'fechaMasReservada' => $reservasData['fechaMasReservada'], 'mesaMasReservada' => $reservasData['mesaMasReservada']], $this->fechaFin, $this->fechaFin, $today);
        } else if (isset($this->clientes)) {
            $plantillaCliente = $this->model->plantillaClientes(['today' => $today, 'listadoCliente' => $clientesData]);
        }


        $css = file_get_contents($_ENV['URL'] . "public/css/pdf.css");

        $mpdf->SetTitle("Reporte reservaciones");
        $mpdf->SetAuthor("Reserva Ya");
        $mpdf->SetHTMLFooter("
        <footer class='footer'>
            <p>© Todos los derechos reservados | Reserva Ya 2021</p>
        </footer>");

        $mpdf->WriteHTML($css, 1);

        if (isset($this->insumos)) {
            $mpdf->WriteHTML($plantillaInsumo, 2);
        } else if (isset($this->reservas)) {
            $mpdf->WriteHTML($plantillaReserva, 2);
        } else if (isset($this->clientes)) {
            $mpdf->WriteHTML($plantillaCliente, 2);
        }

        if (isset($this->insumos)) {
            $mpdf->Output('public/reports/Reporte-' . $this->insumos . '-' . $codigo . '.pdf', 'F');
            echo ('public/reports/Reporte-' . $this->insumos . '-' . $codigo . '.pdf');
        } else if (isset($this->reservas)) {
            $mpdf->Output('public/reports/Reporte-' . $this->reservas . '-' . $codigo . '.pdf', 'F');
            echo ('public/reports/Reporte-' . $this->reservas . '-' . $codigo . '.pdf');
        } else if (isset($this->clientes)) {
            $mpdf->Output('public/reports/Reporte-cliente-' . $codigo . '.pdf', 'F');
            echo ('public/reports/Reporte-cliente-' . $codigo . '.pdf');
        }
    }
}
