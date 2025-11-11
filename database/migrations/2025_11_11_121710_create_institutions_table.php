<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nome do Banco/Instituição (Ex: Nubank, Inter)');
            $table->string('routing_code')->nullable()->comment('Código de Roteamento (BIC/SWIFT, etc.)');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
