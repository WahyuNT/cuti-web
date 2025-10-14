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
            CREATE VIEW view_cuti_active AS
            SELECT
                c.id AS id,
                c.user_id AS user_id,
                u.name AS user_name,
                c.cuti_type_id AS cuti_type_id,
                ct.name AS cuti_type_name,
                c.alasan AS alasan,
                c.alamat_selama_cuti AS alamat_selama_cuti,
                c.delegasi_id AS delegasi_id,
                d.name AS delegasi_name,
                c.atasan_langsung AS atasan_langsung_id,
                al.name AS atasan_langsung_name,
                c.pejabat AS pejabat_id,
                p.name AS pejabat_name,
                c.nomor_surat AS nomor_surat,
                c.pengganti_atasan_id AS pengganti_atasan_id,
                j1.nama AS pengganti_atasan_name,
                c.pengganti_atasan_atasan_id AS pengganti_atasan_atasan_id,
                j2.nama AS pengganti_atasan_atasan_name,
                c.tanggal_mulai AS tanggal_mulai,
                c.tanggal_selesai AS tanggal_selesai
            FROM cuti c
            JOIN users u ON c.user_id = u.id
            JOIN cuti_type ct ON c.cuti_type_id = ct.id
            JOIN users d ON c.delegasi_id = d.id
            LEFT JOIN users al ON c.atasan_langsung = al.id
            LEFT JOIN users p ON c.pejabat = p.id
            LEFT JOIN jabatan j1 ON c.pengganti_atasan_id = j1.id
            LEFT JOIN jabatan j2 ON c.pengganti_atasan_atasan_id = j2.id
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
