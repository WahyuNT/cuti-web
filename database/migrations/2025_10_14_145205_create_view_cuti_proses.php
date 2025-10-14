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
            CREATE VIEW view_cuti_proses AS
            SELECT 
                c.id AS id,
                c.user_id AS user_id,
                u.name AS nama,
                c.cuti_type_id AS cuti_type_id,
                ct.name AS cuti_type,
                c.alasan AS alasan,
                c.tanggal AS tanggal,
                c.status AS status,
                c.keterangan AS keterangan,
                u.atasan_langsung AS atasan_langsung_id,
                u.atasan_atasan_langsung AS atasan_atasan_langsung_id,
                CASE 
                    WHEN vucia.jabatan_id IS NOT NULL THEN vucia.delegasi_id
                    ELSE NULL
                END AS pengganti_atasan_id,
                CASE 
                    WHEN vucia_atasan_atasan.jabatan_id IS NOT NULL THEN vucia_atasan_atasan.delegasi_id
                    ELSE NULL
                END AS pengganti_atasan_atasan_langsung_id,
                c.atasan_langsung AS atasan_langsung,
                c.pejabat AS pejabat
            FROM cuti c
            JOIN users u ON c.user_id = u.id
            JOIN cuti_type ct ON c.cuti_type_id = ct.id
            LEFT JOIN users d_user ON c.delegasi_id = d_user.id
            LEFT JOIN view_user_cuti_izin_active vucia ON vucia.jabatan_id = u.atasan_langsung
            LEFT JOIN view_user_cuti_izin_active vucia_atasan_atasan ON vucia_atasan_atasan.jabatan_id = u.atasan_atasan_langsung
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_cuti_proses');
    }
};
