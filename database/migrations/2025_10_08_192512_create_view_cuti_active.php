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
    CREATE VIEW view_cuti_active AS
    SELECT
        c.id AS id,
        c.user_id AS user_id,
        u.name AS user_name,
        c.cuti_type_id AS cuti_type_id,
        ct.name AS cuti_type_name,
        c.alasan AS alasan
    FROM cuti c
    JOIN users u ON c.user_id = u.id
    JOIN cuti_type ct ON c.cuti_type_id = ct.id
    WHERE c.status = 'success'
    AND FIND_IN_SET(DATE_FORMAT(CURDATE(), '%Y-%m-%d'), c.tanggal) <> 0
");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_cuti_active');
    }
};
