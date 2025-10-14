<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_izin_proses AS
            SELECT 
                i.id,
                i.user_id,
                u.name AS nama_user,
                i.izin_type_id,
                it.name AS izin_type,
                i.tanggal,
                i.mulai_pukul,
                i.sampai_pukul,
                i.delegasi_id,
                u.atasan_langsung,
                CASE 
                    WHEN vucia.jabatan_id IS NOT NULL THEN vucia.delegasi_id 
                    ELSE NULL 
                END AS pengganti_atasan_id,
                i.status,
                i.keterangan,
                i.keperluan
            FROM izin i
            JOIN izin_type it ON i.izin_type_id = it.id
            JOIN users u ON i.user_id = u.id
            LEFT JOIN view_user_cuti_izin_active vucia ON vucia.jabatan_id = u.atasan_langsung
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_izin_proses');
    }
};
