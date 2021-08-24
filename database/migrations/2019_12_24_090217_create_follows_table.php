<!-- <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->unsignedInteger('follow')->comment('フォローしているユーザID');
            $table->unsignedInteger('follower')->comment('フォローされているユーザID');

            $table->index('follow');
            $table->index('follower');
            // $table->timestamp('updated_at')->useCurrent()->nullable();
            // $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamps();

            $table->unique([
                'follow',
                'follower'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }

}
