<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GeneaLabs\Phpgmaps\Phpgmaps;
use App\clases\DiseñoMapa;
use App\Models\UbicacionJug;

class GmapsController extends Controller {

    public function getJugadoresCercanos(Request $request) {

    }

    /*
    CREATE FUNCTION jugadores_cercanos(pos_lat double precision, pos_lng double precision, radio_km double precision) RETURNS SETOF grifos
    LANGUAGE plpgsql
    AS $$
BEGIN
    return query 
    SELECT  
        uuid,  
        comuna,
        coordenadas
    FROM grifos 
    WHERE ( 
            6372.795477598 * 
            ACOS(
                SIN ( RADIANS(grifos.coordenadas[0]) ) * SIN( RADIANS((pos_lat)) ) + 
                COS ( RADIANS(grifos.coordenadas[0]) ) * COS( RADIANS((pos_lat)) ) * 
                COS ( RADIANS(grifos.coordenadas[1]) - RADIANS(pos_lng) )
            )
    ) < radio_km;
END
$$;
    */

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