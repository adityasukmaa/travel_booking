<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::unprepared('
            CREATE FUNCTION calculateTotalPrice(ticket_price DECIMAL(10,2), ticket_quantity INT)
            RETURNS DECIMAL(10,2)
            BEGIN
                RETURN ticket_price * ticket_quantity;
            END;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS calculateTotalPrice');
    }
};
