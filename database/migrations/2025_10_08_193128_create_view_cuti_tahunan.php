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
            SELECT
            `v`.`user_id` AS `user_id`,
            min(`v`.`cuti_type_id`) AS `cuti_type_id`,
            min(`v`.`cuti_type`) AS `cuti_type`,
            sum(
                (
                CASE
                    WHEN (
                        `v`.`tahun` = (
                        SELECT
                            max(`v2`.`tahun`)
                        FROM
                            `view_cuti_kuota` `v2`
                        WHERE
                            ((`v2`.`user_id` = `v`.`user_id`) AND (`v2`.`is_count` = 1))
                        )
                    ) THEN
                    (CASE WHEN (`v`.`sisa_kuota` < 0) THEN 0 ELSE `v`.`sisa_kuota` END)
                    ELSE
                    (CASE WHEN (`v`.`sisa_cuti_tersimpan` < 0) THEN 0 ELSE `v`.`sisa_cuti_tersimpan` END)
                END
                )
            ) AS `sisa_kuota`,
            trim(
                TRAILING ','
                FROM
                group_concat(
                    REPEAT
                    (
                    concat(`v`.`tahun`, ','),
                    (
                        CASE
                        WHEN (
                            `v`.`tahun` = (
                                SELECT
                                max(`v2`.`tahun`)
                                FROM
                                `view_cuti_kuota` `v2`
                                WHERE
                                ((`v2`.`user_id` = `v`.`user_id`) AND (`v2`.`is_count` = 1))
                            )
                            ) THEN
                            (CASE WHEN (`v`.`sisa_kuota` < 0) THEN 0 ELSE `v`.`sisa_kuota` END)
                        ELSE
                            (CASE WHEN (`v`.`sisa_cuti_tersimpan` < 0) THEN 0 ELSE `v`.`sisa_cuti_tersimpan` END)
                        END
                    )
                    )
                    ORDER BY
                    `v`.`tahun` ASC SEPARATOR ''
                )
            ) AS `uraian_tahun`
            FROM
            `view_cuti_kuota` `v`
            WHERE
            (`v`.`is_count` = 1)
            GROUP BY
            `v`.`user_id`
            ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_cuti_tahunan');
    }
};
