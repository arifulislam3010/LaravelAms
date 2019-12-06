<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Faker\Factory::create();

        DB::table('modules')->insert([
            'module_name'   => 'Contact',
            'module_prefix' => 'contact',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Contact Category',
            'module_prefix' => 'contact/category',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Account Chart',
            'module_prefix' => 'account-chart',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Inventory Item',
            'module_prefix' => 'inventory',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Inventory Category',
            'module_prefix' => 'inventory/category',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Stock Management',
            'module_prefix' => 'stock-management',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Product Track',
            'module_prefix' => 'product-track',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Manual Journal',
            'module_prefix' => 'manual-journal',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Bill',
            'module_prefix' => 'bill',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Credit Note',
            'module_prefix' => 'credit-note',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Credit Note Refund ',
            'module_prefix' => 'credit-note/refund',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Expense',
            'module_prefix' => 'expense',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Inventory',
            'module_prefix' => 'inventory',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Inventory Category',
            'module_prefix' => 'inventory/category',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Invoice',
            'module_prefix' => 'invoice',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Payment Made',
            'module_prefix' => 'payment-made',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Payment Received',
            'module_prefix' => 'payment-received',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('modules')->insert([
            'module_name'   => 'Report',
            'module_prefix' => 'report',
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);
        
    }
}
