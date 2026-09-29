<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('server')->nullable()->after('user_id')->comment('Server game pengguna');
            $table->integer('quantity')->default(1)->after('server')->comment('Jumlah pembelian');
            $table->decimal('total_price', 10, 0)->nullable()->after('quantity')->comment('Total harga setelah dikalikan quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['server', 'quantity', 'total_price']);
        });
    }
};
