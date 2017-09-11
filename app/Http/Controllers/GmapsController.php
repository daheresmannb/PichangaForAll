<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GeneaLabs\Phpgmaps\Phpgmaps;
use App\clases\DiseñoMapa;

/*
$config['directions'] = TRUE;
$config['directionsStart'] = 'empire state building';
$config['directionsEnd'] = 'statue of liberty';
$config['directionsDivID'] = 'directionsDiv';
*/

class GmapsController extends Controller {

    public function index() {
        $diseño = new DiseñoMapa();
        $config['center'] = 'auto';
        $config['apiKey'] = 'AIzaSyCjpd08Tu7zozwrj3-Sb3RIBUv13gnY3SQ';
        
        $config['zoom'] = '15';
        $config['styles'] = $diseño->getDis(); 
        $config['places'] = true;
        $config['placesAutocompleteInputID'] = 'direccion';
        $config['placesAutocompleteBoundsMap'] = true; 

        $config['onboundschanged'] = '
        	if (!centreGot) {
            	var mapCentre = map.getCenter();
            	marker_0.setOptions({
                	position: new google.maps.LatLng(
                        mapCentre.lat(), 
                        mapCentre.lng()
                    )
            	});
        	}
        	centreGot = true;
        ';

        $pgm = new Phpgmaps();
        $pgm->initialize($config);

		$marker = array();
		$marker['onclick'] = "
            document.getElementById('light').style.display='block';
            document.getElementById('fade').style.display='block';
        ";
		//$marker['infowindow_content'] = 'Mi Ubicacion';
		$marker['icon'] = url('assets/img/jugador2.png');
		$marker['animation'] = 'BOUNCE';
		$pgm->add_marker($marker);
		$data = $pgm->create_map();

        //Devolver vista con datos del mapa
        return view('userjugador.gmaps')->with('map', $data);
    }

    public function LatLngbyDirect(Request $Request) {
        $pgm = new Phpgmaps();

        $latlng = $pgm->get_lat_long_from_address(
        	$Request->direccion
        );


   	    $config = array();
        //$config['center'] = 'auto';
        $config['map_width'] = 800;
        $config['map_height'] = 800;
        $config['zoom'] = 15;
        $config['onboundschanged'] = '
        	if (!centreGot) {
            	var mapCentre = map.getCenter();
            	marker_0.setOptions({
                	position: new google.maps.LatLng(
                		'.$latlng[0].', 
                		'.$latlng[1].'
                	)
            	});
        	}
        	centreGot = true;
        ';

        $pgm->initialize($config);
        $marker = array(); 
		if (strcmp($latlng[2], "") == 0) {
			$marker['position'] = $latlng[0].', '.$latlng[1];			
		}

		$marker['draggable'] = TRUE;
		$marker['animation'] = 'DROP';

        $pgm->add_marker($marker);
        $map = $pgm->create_map();

        return redirect('gmaps')->with(
            'map', 
            $map
        );
   }
}