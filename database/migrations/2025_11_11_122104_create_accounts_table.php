<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('institution_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name')->comment('Nome da Conta (Ex: Conta Corrente PF Nubank)');
            $table->enum('account_type', ['Checking', 'Savings', 'CreditCard', 'Investment', 'Loan', 'Other'])
                ->comment('Tipo de Conta Financeira');
            $table->decimal('initial_balance', 15, 2)->default(0.00)->comment('Saldo no momento da abertura/inclusão');
            $table->decimal('current_balance', 15, 2)->default(0.00)->comment('Saldo atual calculado.');
            $table->string('number')->nullable()->comment('Número da Conta (Opcional)');
            $table->timestamp('last_reconciled')->nullable()->comment('Última Data de Conciliação');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
