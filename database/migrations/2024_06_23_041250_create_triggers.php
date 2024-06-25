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
            CREATE TRIGGER after_booking_insert
            AFTER INSERT ON bookings
            FOR EACH ROW
            BEGIN
                INSERT INTO booking_logs (booking_id, action, created_at)
                VALUES (NEW.id, "INSERT", NOW());
            END;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_booking_insert');
    }
};
