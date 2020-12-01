<?php

use App\Models\Promo;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Route::class);
            $table->foreignIdFor(Schedule::class);
            $table->foreignIdFor(Promo::class)->nullable();
            $table->string('ticker_number');
            $table->string('type');
            $table->decimal('price');
            $table->decimal('discount')->default(0);
            $table->string('promo_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
