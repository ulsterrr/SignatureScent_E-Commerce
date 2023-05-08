<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(LoaiTaiKhoanSeeder::class);
        $this->call(PhanQuyenSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LoaiSanPhamSeeder::class);
        $this->call(ChiNhanhSeeder::class);
        $this->call(SanPhamSeeder::class);
        $this->call(LoaiKichCoSeeder::class);
        $this->call(BangKhoaChinhSeeder::class);
    }
}
