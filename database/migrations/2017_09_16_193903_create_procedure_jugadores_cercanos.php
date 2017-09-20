<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


// SELECT ST_X(location::geometry), ST_Y(location::geometry) FROM ubicacion_jugador;

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
                    jugador_id,
                    location,
                    created_at,
                    updated_at
                FROM ubicacion_jugador 
                WHERE ( 
                    6372.795477598 * 
                    ACOS(
                        SIN ( RADIANS(ST_X(location::geometry)) ) * SIN( RADIANS((pos_lat)) ) + 
                        COS ( RADIANS(ST_X(location::geometry)) ) * COS( RADIANS((pos_lat)) ) * 
                        COS ( RADIANS(ST_Y(location::geometry)) - RADIANS(pos_lng) )
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
