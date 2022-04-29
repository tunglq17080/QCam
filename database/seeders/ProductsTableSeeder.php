<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name'=>'Máy ảnh Canon EOS 250D Body/ Đen','category_id'=>'1','description'=> '','unit_price'=>15300000,'promotion_price'=>'0','image'=>'demo/product/may-anh-canon-eos-250d(1).jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'Máy ảnh Canon Ixus 185/ Đen','category_id'=>'1','description'=> '','unit_price'=>4390000,'promotion_price'=>'0','image'=>'demo/product/canon-ixus-185-den(1).jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'Máy ảnh Sony Cybershot DSC-W830/ Đen','category_id'=>'1','description'=> '','unit_price'=>4490000,'promotion_price'=>'0','image'=>'demo/product/sony-cybershot-dsc-w830-den.jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'Máy Ảnh Panasonic Lumix DC-S1 Body','category_id'=>'1','description'=> '','unit_price'=>53990000,'promotion_price'=>'0','image'=>'demo/product/may-anh-panasonic-lumix-s1(2).jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'Máy ảnh Canon Powershot G7 X Mark III/ Đen (nhập khẩu)','category_id'=>'1','description'=> '','unit_price'=>16900000,'promotion_price'=>'0','image'=>'demo/product/may-anh-canon-powershot-g7-x-mark-iii-hang-nhap-khau(3).jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'Tai nghe Bose Noise Cancelling Headphones 700 (Đen)','category_id'=>'2','description'=> '','unit_price'=>9290000,'promotion_price'=>'0','image'=>'demo/product/tai-nghe-bose-noise-cancelling-headphones-700.jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'Tai Nghe Không Dây Bose Soundsport Free (Cam)','category_id'=>'2','description'=> '','unit_price'=>5990000,'promotion_price'=>'0','image'=>'demo/product/tai-nghe-khong-day-bose-soundsport-free-cam.jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'iPhone 11 Pro Max Chính hãng','category_id'=>'3','description'=> '','unit_price'=>26000000,'promotion_price'=>'0','image'=>'demo/product/iphone-11-pro-max_4_.jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'iPhone 12 Pro Max 256GB I Chính hãng VN/A','category_id'=>'3','description'=> '','unit_price'=>29990000,'promotion_price'=>'0','image'=>'demo/product/iphone-12-pro-max_1__5.jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'Hộp Đựng Thẻ Nhớ Chống Sock, Chống Nước','category_id'=>'4','description'=> '','unit_price'=>200000,'promotion_price'=>'0','image'=>'demo/product/hop-dung-the-nho-chong-sock-chong-nuoc.jpg','unit'=>'cái','new'=>'1'],
        ]);
    }
}
