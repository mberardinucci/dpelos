<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Ingresos Controller
 *
 * @property \App\Model\Table\IngresosTable $Ingresos
 *
 * @method \App\Model\Entity\Ingreso[] paginate($object = null, array $settings = [])
 */
class MonitorController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    	$this->loadModel('Ingresos');
    	
    	//obtengo fecha actual
		date_default_timezone_set('America/Santiago');
        $date = date('d-m-Y', time());   
        
    	$month = date('m');
    	$year = date('Y');
		
    	$fechas = $this->getListadoFechasMes($month,$year);    	    
    	
    	$desde = new Time(reset($fechas));
    	$hasta = new Time(end($fechas));    

       $query = $this->Ingresos->find('all', [
    			'conditions' => ['fecha >=' => $desde, 'fecha <=' => $hasta]
			]);

       $montoEfectivo = 0;
       $montoTransferencia = 0;
       foreach($query as $ingreso) {
       		if($ingreso->medio_pago == 'Transferencia'){
       			$montoTransferencia = $montoTransferencia + $ingreso->monto;
       		}
       		if($ingreso->medio_pago == 'Efectivo'){
       			$montoEfectivo = $montoEfectivo + $ingreso->monto;
       		}
       }
	   	  
       $ingresos = array();       
       foreach($fechas as $fecha) {       		
       		$monto = 0;
       		$ingresos[$fecha] = array();
       		$ingresos[$fecha]['montoTotal'] = $monto;       		
       		$ingresos[$fecha]['montoProductos'] = $monto;    
  			$ingresos[$fecha]['montoServicios'] = $monto; 
       		
       		foreach($query as $ingreso) {
       			$f = $ingreso->fecha->i18nFormat('dd-MM-yyyy');
       			if($fecha == $f){       
       				$montoProductos = $this->getMontoProductos($ingreso->id);	       					
       				$montoServicios = $this->getMontoServicios($ingreso->id);
       				$monto = $monto + $ingreso['monto'];
       				$ingresos[$fecha]['montoTotal'] = $monto;       		
       				$ingresos[$fecha]['montoProductos'] = $ingresos[$fecha]['montoProductos'] + $montoProductos;    
       				$ingresos[$fecha]['montoServicios'] = $ingresos[$fecha]['montoServicios'] + $montoServicios;    
       			}
       		}
       }
       $montos = $this->getMontos($ingresos);
       //busco las alarmas de productos
       $alarmasStock = $this->getAlarmasStockProductos();
       $capital = $this->getCapital();
       $gasto = $this->getGastos($desde,$hasta);
       
       //debug($ingresos);exit;            
      	$this->set('ingresos', $ingresos);
      	$this->set('labels', $fechas);
      	$this->set('montos', $montos);
      	$this->set('alarmasStock', $alarmasStock);
      	$this->set('capital', $capital);
      	$this->set('gasto', $gasto);
      	$this->set('montoEfectivo', $montoEfectivo);
      	$this->set('montoTransferencia', $montoTransferencia);
    }
    public function getMesesConMovimientos(){      
      $this->loadModel('Ingresos');
      
    }
    public function getAlarmasStockProductos(){
    	$this->loadModel('Productos');
    	$query = $this->Productos->find('all');
    	$productos = array();
    	foreach($query as $producto) {
    		if($producto->stock <= $producto->alerta_stock ){
    			$productos[$producto->id]['stock'] = $producto->stock;
    			$productos[$producto->id]['alerta_stock'] = $producto->alerta_stock;
    			$productos[$producto->id]['nombre'] = $producto->nombre;
    		}
    	}    
    	return $productos;	 
    }
    public function getGastos($desde, $hasta){
    	$monto = 0;

    	$this->loadModel('Gastos');
    	$query = $this->Gastos->find('all', [
    			'conditions' => ['fecha >=' => $desde, 'fecha <=' => $hasta]
			]);
    	foreach($query as $gasto) {
    		$monto = $monto + $gasto['monto'];
    	}
    	return $monto;
    	
    }
    public function getCapital(){
		$this->loadModel('Parametros');
		 $capital = $this->Parametros->get(1);		
		return $capital['valor'];
    }
    public function getMontos($ingresos){
    	
    	$montos = array();
    	foreach($ingresos as $ingreso) {    		
    		array_push($montos, $ingreso['montoTotal']);
    	}
    	return $montos;
    }
    public function getMontoProductos($id){
    	$this->loadModel('VentaProductos');    	
    	$query = $this->VentaProductos->find('all', ['conditions' => ['ingreso_id =' => $id]]);
    	$monto = 0;
    	foreach($query as $producto) {    
    		$monto = $monto + ($producto->valor*$producto->cantidad);    		
    	}    	    	
    	return $monto;
    }
    public function getMontoServicios($id){
    	$this->loadModel('Servicios');
    	$query = $this->Servicios->find('all', ['conditions' => ['ingreso_id =' => $id]]);
    	$monto = 0;    	
    	foreach($query as $servicio) {    
    		$monto = $monto + ($servicio->valor);    		
    	}   
    	return $monto;
    }
    public function getListadoFechasMes($month, $year){
    	//$month = "05";
		//$year = "2014";

		$start_date = "01-".$month."-".$year;
		$start_time = strtotime($start_date);

		$end_time = strtotime("+1 month", $start_time);

		for($i=$start_time; $i<$end_time; $i+=86400)
		{
		   $list[] = date('d-m-Y', $i);
		}
		return $list;
    }
}
