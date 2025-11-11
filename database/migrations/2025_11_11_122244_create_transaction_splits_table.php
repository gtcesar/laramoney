<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaction_splits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->foreignId('account_id')->constrained()->onDelete('cascade')
                ->comment('Conta Financeira (Checking, CreditCard, etc.)');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')
                ->comment('Categoria de Destino (Income, Expense, etc.)');
            $table->foreignId('payee_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('amount', 15, 2)->comment('Valor da Movimentação (Positivo para Crédito, Negativo para Débito)');
            $table->text('memo')->nullable()->comment('Nota específica para este lado da transação');
            $table->boolean('reconciled')->default(false)->comment('Se a movimentação foi conciliada');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction_splits');
    }
};
