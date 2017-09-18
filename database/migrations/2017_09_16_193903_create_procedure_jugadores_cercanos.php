<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureJugadoresCercanos extends Migration {
    public function up() {
        $sql = "
            CREATE FUNCTION jugadores_cercanos(pos_lat double precision, pos_lng double precision, radio_km double precision) RETURNS SETOF ubicacion_jugador
            LANGUAGE plpgsql
            AS $$
            BEGIN
                return query 
                SELECT  
                    id,  
                    location
                FROM ubicacion_jugador 
                WHERE ( 
                    6372.795477598 * 
                    ACOS(
                        SIN ( RADIANS(ubicacion_jugador.location[0]) ) * SIN( RADIANS((pos_lat)) ) + 
                        COS ( RADIANS(ubicacion_jugador.location[0]) ) * COS( RADIANS((pos_lat)) ) * 
                        COS ( RADIANS(ubicacion_jugador.location[1]) - RADIANS(pos_lng) )
                    )
                ) < radio_km;
            END
            $$;
"; 
        DB::connection()->getPdo()->exec($sql); 
    }

    public function down() {
    }
}
