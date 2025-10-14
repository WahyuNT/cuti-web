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
            CREATE VIEW view_user_cuti_izin_active AS
            SELECT 
                u.id AS user_id,
                u.name AS nama,
                u.role_id,
                u.jabatan AS jabatan_id,
                u.atasan_langsung AS atasan_langsung_id,
                u.atasan_atasan_langsung AS atasan_atasan_langsung_id,
                COALESCE(vc.delegasi_id, vi.delegasi_id) AS delegasi_id,
                COALESCE(du.jabatan, NULL) AS jabatan_delegasi_id
            FROM users u
            LEFT JOIN (
                SELECT 
                    view_cuti_active.user_id, 
                    MIN(view_cuti_active.delegasi_id) AS delegasi_id
                FROM view_cuti_active
                GROUP BY view_cuti_active.user_id
            ) vc ON u.id = vc.user_id
            LEFT JOIN (
                SELECT 
                    view_izin_active.user_id, 
                    MIN(view_izin_active.delegasi_id) AS delegasi_id
                FROM view_izin_active
                GROUP BY view_izin_active.user_id
            ) vi ON u.id = vi.user_id
            LEFT JOIN users du ON du.id = COALESCE(vc.delegasi_id, vi.delegasi_id)
            WHERE u.id IN (
                SELECT user_id FROM view_cuti_active
                UNION
                SELECT user_id FROM view_izin_active
            )
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_user_cuti_izin_active');
    }
};
