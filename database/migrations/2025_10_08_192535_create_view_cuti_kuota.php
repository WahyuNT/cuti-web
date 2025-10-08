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
            WITH terpakai AS (
            SELECT
                c.user_id,
                c.cuti_type_id,
                jt.yr AS tahun,
                COUNT(*) AS total_dipakai
            FROM cuti c
            JOIN json_table (
                CONCAT('[\"', REPLACE(REPLACE(c.kuota_used, ' ', ''), ',', '\",\"'), '\"]'),
                '$[*]' COLUMNS (yr INT PATH '$')
            ) jt ON (c.kuota_used IS NOT NULL AND c.kuota_used <> '')
            WHERE c.status = 'success'
            GROUP BY c.user_id, c.cuti_type_id, jt.yr
            ),
            pakai_tersimpan AS (
            SELECT
                c.user_id,
                c.cuti_type_id,
                jt.yr AS tahun_cadangan,
                COUNT(*) AS total_pakai_tersimpan
            FROM cuti c
            JOIN json_table (
                CONCAT('[\"', REPLACE(REPLACE(c.kuota_used, ' ', ''), ',', '\",\"'), '\"]'),
                '$[*]' COLUMNS (yr INT PATH '$')
            ) jt ON (c.kuota_used IS NOT NULL AND c.kuota_used <> '')
            WHERE c.status = 'success' AND jt.yr <> YEAR(c.created_at)
            GROUP BY c.user_id, c.cuti_type_id, jt.yr
            ),
            noncount_pakai AS (
            SELECT
                c.user_id,
                c.cuti_type_id,
                YEAR(c.created_at) AS tahun,
                SUM(c.total_hari) AS total_noncount_dipakai
            FROM cuti c
            WHERE c.status = 'success'
            GROUP BY c.user_id, c.cuti_type_id, YEAR(c.created_at)
            )
            SELECT
            cu.id AS id_cuti,
            cu.user_id,
            u.name AS nama_user,
            cu.cuti_type_id,
            ct.name AS cuti_type,
            ct.is_count,
            cu.kuota,
            COALESCE(cu.cuti_tersimpan, 0) AS cuti_tersimpan,
            cu.tahun,
            CASE
                WHEN ct.is_count = 1 THEN COALESCE(t.total_dipakai, 0)
                ELSE COALESCE(nc.total_noncount_dipakai, 0)
            END AS total_dipakai,
            GREATEST(
                cu.kuota - (
                CASE
                    WHEN ct.is_count = 1 THEN COALESCE(t.total_dipakai, 0)
                    ELSE COALESCE(nc.total_noncount_dipakai, 0)
                END
                ), 0
            ) AS sisa_kuota,
            CASE
                WHEN ct.is_count = 1 THEN COALESCE(pt.total_pakai_tersimpan, 0)
                ELSE 0
            END AS cuti_tersimpan_digunakan,
            CASE
                WHEN ct.is_count = 1 THEN GREATEST(COALESCE(cu.cuti_tersimpan, 0) - COALESCE(pt.total_pakai_tersimpan, 0), 0)
                ELSE 0
            END AS sisa_cuti_tersimpan
            FROM cuti_user cu
            JOIN users u ON u.id = cu.user_id
            JOIN cuti_type ct ON ct.id = cu.cuti_type_id
            LEFT JOIN terpakai t ON t.user_id = cu.user_id AND t.cuti_type_id = cu.cuti_type_id AND t.tahun = cu.tahun
            LEFT JOIN pakai_tersimpan pt ON pt.user_id = cu.user_id AND pt.cuti_type_id = cu.cuti_type_id AND pt.tahun_cadangan = cu.tahun
            LEFT JOIN noncount_pakai nc ON nc.user_id = cu.user_id AND nc.cuti_type_id = cu.cuti_type_id AND nc.tahun = cu.tahun
            ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_cuti_kuota');
    }
};
