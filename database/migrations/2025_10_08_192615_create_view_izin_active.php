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
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_izin_active AS
            SELECT 
                i.id,
                i.tanggal_acc,
                i.user_id,
                i.izin_type_id,
                i.tanggal,
                i.mulai_pukul,
                i.sampai_pukul,
                i.status,
                i.created_at,
                i.updated_at,
                u.name AS nama
            FROM izin i
            JOIN users u ON u.id = i.user_id
            WHERE i.status = 'success'
              AND i.tanggal = CURDATE()
              AND CURTIME() BETWEEN i.mulai_pukul AND i.sampai_pukul
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_izin_active');
    }
};
