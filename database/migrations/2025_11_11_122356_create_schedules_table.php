<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name')->comment('Nome do Agendamento (Ex: Aluguel, Salário)');
            $table->enum('schedule_type', ['Bill', 'Deposit', 'Transfer'])
                ->comment('Tipo de Recorrência');
            $table->string('frequency')->comment('Frequência de repetição (Ex: Monthly, Weekly)');
            $table->decimal('amount', 15, 2)->comment('Valor base do Agendamento');
            $table->date('next_due_date')->comment('Próxima data de vencimento/pagamento');
            $table->foreignId('account_id')->constrained()->onDelete('cascade')
                ->comment('Conta de Ativo/Passivo envolvida');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')
                ->comment('Categoria de Receita/Despesa envolvida');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
