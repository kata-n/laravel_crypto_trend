<?php

use Illuminate\Database\Seeder;

class Crypto_detailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $cryptos = [
          $crypto1 = [
            'crypto_id' => 1,
            'name' => 'BTC',
            'name_ja' => 'ビットコイン',
            'crypto_high' => 673456,
            'crypto_low' => 224335,
          ],
          $crypto2 = [
            'crypto_id' => 2,
            'name' => 'ETH',
            'name_ja' => 'イーサリアム',
            'crypto_high' => 14159,
            'crypto_low' => 12132,
          ],
          $crypto3 = [
            'crypto_id' => 3,
            'name' => 'ETC',
            'name_ja' => 'イーサリアムクラシック',
            'crypto_high' => 555.11,
            'crypto_low' => 423.01,
          ],
          $crypto4 = [
            'crypto_id' => 4,
            'name' => 'LSK',
            'name_ja' => 'リスク',
            'crypto_high' => 132.11,
            'crypto_low' => 100.22,
          ],
          $crypto5 = [
            'crypto_id' => 5,
            'name' => 'FCT',
            'name_ja' => 'ファクトム',
            'crypto_high' => 189.9,
            'crypto_low' => 188,
          ],
          $crypto6 = [
            'crypto_id' => 6,
            'name' => 'XRP',
            'name_ja' => 'リップル',
            'crypto_high' => 21.605,
            'crypto_low' => 18.528,
          ],
          $crypto7 = [
            'crypto_id' => 7,
            'name' => 'XEM',
            'name_ja' => 'ネム',
            'crypto_high' => 4.023,
            'crypto_low' => 3.844,
          ],
          $crypto8 = [
            'crypto_id' => 8,
            'name' => 'LTC',
            'name_ja' => 'ライトコイン',
            'crypto_high' => 4087,
            'crypto_low' => 3999.9,
          ],
          $crypto9 = [
            'crypto_id' => 9,
            'name' => 'BCH',
            'name_ja' => 'ビットコインキャッシュ',
            'crypto_high' => 24877,
            'crypto_low' => 23033,
          ],
          $crypto10 = [
            'crypto_id' => 10,
            'name' => 'MONA',
            'name_ja' => 'モナコイン',
            'crypto_high' => 137.8,
            'crypto_low' => 124.18,
          ],
          $crypto11 = [
            'crypto_id' => 11,
            'name' => 'XLM',
            'name_ja' => 'ステラルーメン',
            'crypto_high' => 5.264,
            'crypto_low' => 4.292,
          ],
          $crypto12 = [
            'crypto_id' => 12,
            'name' => 'QTUM',
            'name_ja' => 'クアンタム',
            'crypto_high' => 136.28,
            'crypto_low' => 128.3,
          ],
          $crypto13 = [
            'crypto_id' => 13,
            'name' => 'DASH',
            'name_ja' => 'ダッシュ',
            'crypto_high' => null,
            'crypto_low' => null,
          ],
          $crypto14 = [
            'crypto_id' => 14,
            'name' => 'ZEC',
            'name_ja' => 'ジーキャッシュ',
            'crypto_high' => null,
            'crypto_low' => null,
          ],
          $crypto15 = [
            'crypto_id' => 15,
            'name' => 'XMR',
            'name_ja' => 'モネロ',
            'crypto_high' => null,
            'crypto_low' => null,
          ],
          $crypto16 = [
            'crypto_id' => 16,
            'name' => 'REP',
            'name_ja' => 'オーガー',
            'crypto_high' => null,
            'crypto_low' => null,
          ],
        ];
        foreach ($cryptos as $crypto) {
        DB::table('crypto_details')->insert($crypto);
        }
    }
}
