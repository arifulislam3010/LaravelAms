<?php

use Illuminate\Database\Seeder;

class CreditNotePaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = Faker\Factory::create();

        foreach(range(1,10) as $index)
        {
            DB::table('credit_note_payments')->insert([
                'amount'         => $data->numberBetween(50,100),
                'invoice_id'     => $data->numberBetween(1,10),
                'credit_note_id' => $data->numberBetween(1,10),
                'created_at'     => $data->dateTime($max = 'now'),
                'updated_at'     => $data->dateTime($max = 'now'),
                'created_by'     => $data->numberBetween(1,10),
                'updated_by'     => $data->numberBetween(1,10),
            ]);
        }
    }
}
