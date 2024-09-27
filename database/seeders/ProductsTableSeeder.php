<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['name' => 'โอวันตินโกลด์ 3 in 1 แพ็ก 12 ซอง', 'price' => '125', 'cost' => 100, 'product_type_id' => 1, 'image_url' => 'https://backend.tops.co.th/media/catalog/product/8/8/8850086163906_15-12-2022.jpg'],
            ['name' => 'โอวันตินโกลด์ 3 in 1 แพ็ก 12 ซอง', 'price' => '125', 'cost' => 100, 'product_type_id' => 1, 'image_url' => ''],
            ['name' => 'มันหวานญี่ปุ่นเผา', 'price' => '27', 'cost' => 20, 'product_type_id' => 2, 'image_url' => 'https://www.prachachat.net/wp-content/uploads/2020/06/8-2.jpg'],
            ['name' => 'บิ๊กเปาหมูสับไข่เค็ม', 'price' => '20', 'cost' => 17, 'product_type_id' => 2, 'image_url' => 'http://about7eleven.com/wp-content/uploads/2021/08/7-113-5.jpg'],
            ['name' => 'ข้าวผัดไก่เกาหลี', 'price' => '45', 'cost' => 40, 'product_type_id' => 3, 'image_url' => ''],
            ['name' => 'ข้าวญี่ปุ่นผัดแซลมอน', 'price' => '37', 'cost' => 30, 'product_type_id' => 3, 'image_url' => ''],
            ['name' => 'H FH ขนมปังโลฟลูกเกด', 'price' => '20', 'cost' => 15, 'product_type_id' => 4, 'image_url' => 'https://shop.farmhouse.co.th/media/catalog/product/cache/09ad5326b5f9b030d858c3959bbb1f0b/2/0/2021_loaf_raisin.png'],
            ['name' => 'เค้กกล้วยหอม', 'price' => '10', 'cost' => 7, 'product_type_id' => 4, 'image_url' => 'https://pbs.twimg.com/media/DkPg-toVAAILco-.jpg'],
            ['name' => 'นมพาสฯ เมจิจืด 830 มล.', 'price' => '46.75', 'cost' => 40, 'product_type_id' => 5, 'image_url' => 'https://backend.tops.co.th/media/catalog/product/8/8/8850329183111_e24-03-2020.jpg'],
            ['name' => 'โยเกิร์ตดัชชี่วุ้นมะพร้าว', 'price' => '15', 'cost' => 10, 'product_type_id' => 5, 'image_url' => 'https://backend.tops.co.th/media/catalog/product/8/8/8851717020148_22-06-2020.jpg'],
            ['name' => 'แม็กนั่ม อัลมอนด์', 'price' => '45', 'cost' => 40, 'product_type_id' => 6, 'image_url' => 'https://assets.unileversolutions.com/v1/1451839.png'],
            ['name' => 'เอเชียนดีไลท์ เผือก', 'price' => '25', 'cost' => 22, 'product_type_id' => 6, 'image_url' => 'https://img.my-best.in.th/product_images/297b3310d8d5c88ee20e6180394f52e0.jpeg?ixlib=rails-4.2.0&q=70&lossless=0&w=800&h=800&fit=clip&s=d006c40fd097c0e17090fae42c106aae'],
            ['name' => 'คอนเน่รสดั้งเดิม', 'price' => '20', 'cost' => 18, 'product_type_id' => 7, 'image_url' => 'https://media.allonline.7eleven.co.th/pdmain/401610-01-Supermarket-Cone.jpg'],
            ['name' => 'เลย์ร็อครสมันฝรั่งแท้', 'price' => '45', 'cost' => 35, 'product_type_id' => 7, 'image_url' => ''],
            ['name' => 'น้ำผึ้งดอนคำ 770 กรัม', 'price' => '185', 'cost' => 150, 'product_type_id' => 8, 'image_url' => 'https://media.allonline.7eleven.co.th/pdmain/357901-01-potato-chip-lays-v3.jpg'],
            ['name' => 'ปลาแมคเคอเรล โรซ่า 155 กรัม', 'price' => '19.50', 'cost' => 12, 'product_type_id' => 8, 'image_url' => 'https://media.allonline.7eleven.co.th/pdzoom/394579_flashsale_Supermarket.jpg'],
            ['name' => 'ข้าวหอมผสม 70:30 ฉัตรส้ม 5 กก.', 'price' => '155', 'cost' => 100, 'product_type_id' => 8, 'image_url' => 'https://media.allonline.7eleven.co.th/pdzoom/247266-all-member-24012023.jpg'],
            ['name' => 'ยาสีฟันคอลเกตเกลือสมุนไพร 150 กรัม', 'price' => '60', 'cost' => 56, 'product_type_id' => 9, 'image_url' => 'https://media.allonline.7eleven.co.th/pdmain/355093-01-Toothpaste-Colgate.jpg'],
            ['name' => 'บรีสเอกเซล 1500 กรัม', 'price' => '169', 'cost' => 140, 'product_type_id' => 9, 'image_url' => 'https://media.allonline.7eleven.co.th/pdzoom/826995-all-member-02022023.jpg'],
        ];



        foreach( $data as $item){
            $item['qty'] = rand(1,100);
            DB::table('products')->insert($item);
        }
    }
}
