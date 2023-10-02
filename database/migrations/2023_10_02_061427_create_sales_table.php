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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('instSalesOrderID');
            $table->foreignId('intCustomerID')->nullable()->constrained('customers', 'intCustomerID');
            $table->foreignId('intProductID')->nullable()->constrained('products', 'intProductID');
            $table->dateTime('dtSalesOrder');
            $table->double('intQty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
