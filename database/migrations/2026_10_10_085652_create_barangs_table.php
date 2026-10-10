
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->string('kode_barang', 50)->unique();
            $table->string('nama_barang', 150);
            $table->unsignedInteger('jumlah')->default(0);
            $table->string('kondisi', 50)->default('Baik');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
