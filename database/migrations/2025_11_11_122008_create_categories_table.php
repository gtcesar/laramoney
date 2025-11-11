<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nome da Categoria (Ex: Alimentação, Salário, Moradia)');
            $table->enum('category_type', ['Income', 'Expense', 'Equity', 'Asset', 'Liability'])
                ->comment('Tipo Contábil (Receita/Despesa/Patrimônio/Ativo/Passivo)');
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade')
                ->comment('Para aninhar categorias (Subcategorias)');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
