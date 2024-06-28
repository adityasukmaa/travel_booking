<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE PROCEDURE updateTicketPrice(IN tripID INT, IN newPrice DECIMAL(10,2))
            BEGIN
                UPDATE trips
                SET harga_tiket = newPrice
                WHERE id = tripID;
            END;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS updateTicketPrice');
    }
};
