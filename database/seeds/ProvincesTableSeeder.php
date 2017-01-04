<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('provinces')->truncate();



		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		// 	CURLOPT_URL => "http://pro.rajaongkir.com/api/province",
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_ENCODING => "",
		// 	CURLOPT_MAXREDIRS => 10,
		// 	CURLOPT_TIMEOUT => 30,
		// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 	CURLOPT_CUSTOMREQUEST => "GET",
		// 	CURLOPT_HTTPHEADER => array(
		// 		"key: 9214ef96da7a6e122560b0d8e4771663"
		// 	),
		// ));

		// $response = curl_exec($curl);
		// $err = curl_error($curl);

		// curl_close($curl);

		// if ($err) {
		// 	echo "cURL Error #:" . $err;
		// } else {
		// 	$res = json_decode($response);
		// 	foreach ($res->rajaongkir->results as $item) {
		// 		DB::table('provinces')->insert([
		// 			'id' => $item->province_id,
		// 			'name' => $item->province
		// 		]);
		// 	}
		// }
		$provinces = array(
		  array('id' => '1','name' => 'Bali'),
		  array('id' => '2','name' => 'Bangka Belitung'),
		  array('id' => '3','name' => 'Banten'),
		  array('id' => '4','name' => 'Bengkulu'),
		  array('id' => '5','name' => 'DI Yogyakarta'),
		  array('id' => '6','name' => 'DKI Jakarta'),
		  array('id' => '7','name' => 'Gorontalo'),
		  array('id' => '8','name' => 'Jambi'),
		  array('id' => '9','name' => 'Jawa Barat'),
		  array('id' => '10','name' => 'Jawa Tengah'),
		  array('id' => '11','name' => 'Jawa Timur'),
		  array('id' => '12','name' => 'Kalimantan Barat'),
		  array('id' => '13','name' => 'Kalimantan Selatan'),
		  array('id' => '14','name' => 'Kalimantan Tengah'),
		  array('id' => '15','name' => 'Kalimantan Timur'),
		  array('id' => '16','name' => 'Kalimantan Utara'),
		  array('id' => '17','name' => 'Kepulauan Riau'),
		  array('id' => '18','name' => 'Lampung'),
		  array('id' => '19','name' => 'Maluku'),
		  array('id' => '20','name' => 'Maluku Utara'),
		  array('id' => '21','name' => 'Nanggroe Aceh Darussalam (NAD)'),
		  array('id' => '22','name' => 'Nusa Tenggara Barat (NTB)'),
		  array('id' => '23','name' => 'Nusa Tenggara Timur (NTT)'),
		  array('id' => '24','name' => 'Papua'),
		  array('id' => '25','name' => 'Papua Barat'),
		  array('id' => '26','name' => 'Riau'),
		  array('id' => '27','name' => 'Sulawesi Barat'),
		  array('id' => '28','name' => 'Sulawesi Selatan'),
		  array('id' => '29','name' => 'Sulawesi Tengah'),
		  array('id' => '30','name' => 'Sulawesi Tenggara'),
		  array('id' => '31','name' => 'Sulawesi Utara'),
		  array('id' => '32','name' => 'Sumatera Barat'),
		  array('id' => '33','name' => 'Sumatera Selatan'),
		  array('id' => '34','name' => 'Sumatera Utara')
		);

		DB::table('provinces')->insert($provinces);
    }
}
