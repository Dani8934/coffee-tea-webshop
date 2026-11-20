<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Yirgacheffe',
            'origin' => 'Etiópia',
            'region' => 'Gedeo',
            'type' => 'Szemes kávé',
            'detail' => 'világos pörkölés',
            'description' => 'Etiópia déli részén termett, mosott feldolgozású kávé. Virágos illat, citrusos savasság és teás test jellemzi. Szűrős kávéfőzőhöz és pour overhez ajánljuk.',
            'image' => 'yirgacheffe.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Sencha',
            'origin' => 'Japán',
            'region' => 'Shizuoka',
            'type' => 'Zöld tea',
            'detail' => 'szálas',
            'description' => 'Friss, fűszeres japán zöld tea, enyhén édes, tengeri utóízzel. 70–80 °C-os vízzel készítsd, 1–2 percig áztasd.',
            'image' => 'sencha.jpg',
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Santos',
            'origin' => 'Brazília',
            'region' => 'Sul de Minas',
            'type' => 'Őrölt kávé',
            'detail' => 'sötét pörkölés',
            'description' => 'Brazil kávé, diós-csokoládés ízjegyekkel és alacsony savassággal. Őrölve érkezik, kotyogóshoz és filteres kávéfőzőhöz ajánljuk.',
            'image' => 'santos.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'First Flush',
            'origin' => 'India',
            'region' => 'Darjeeling',
            'type' => 'Fekete tea',
            'detail' => 'szálas',
            'description' => 'Tavaszi szüretű Darjeeling, világos, virágos és muskotályos jegyekkel. Tej nélkül, 90 °C-os vízzel készítsd.',
            'image' => 'first-flush.jpg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Huila',
            'origin' => 'Kolumbia',
            'region' => 'Huila',
            'type' => 'Szemes kávé',
            'detail' => 'közepes pörkölés',
            'description' => 'Kolumbiai kávé karamellás édességgel és lágy, almás savassággal. Szűrős kávéfőzőhöz és eszpresszóhoz is jó.',
            'image' => 'huila.jpg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Sidamo',
            'origin' => 'Etiópia',
            'region' => 'Sidamo',
            'type' => 'Szemes kávé',
            'detail' => 'közepes pörkölés',
            'description' => 'Etióp natúr feldolgozású kávé, érett bogyós gyümölcs és kakaó ízjegyekkel. Teltebb testű, mint a Yirgacheffe, eszpresszóhoz és kézi főzéshez is kiváló.',
            'image' => 'sidamo.jpg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Guji',
            'origin' => 'Etiópia',
            'region' => 'Guji',
            'type' => 'Szemes kávé',
            'detail' => 'világos pörkölés',
            'description' => 'Etiópiai világos pörkölésű kávé őszibarackos, mézes és virágos jegyekkel. Kézi főzéshez, szűrős kávéfőzőhöz ajánljuk.',
            'image' => 'guji.jpg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Harrar',
            'origin' => 'Etiópia',
            'region' => 'Harrar',
            'type' => 'Szemes kávé',
            'detail' => 'közepes pörkölés',
            'description' => 'Vad, gyümölcsös etióp kávé boros, szárított fügés és fűszeres jegyekkel. Különleges, karakteres csésze.',
            'image' => 'harrar.jpg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Cerrado',
            'origin' => 'Brazília',
            'region' => 'Cerrado Mineiro',
            'type' => 'Szemes kávé',
            'detail' => 'közepes pörkölés',
            'description' => 'Lágy, diós brazil kávé tejcsokoládés ízvilággal és alacsony savassággal. Eszpresszóhoz és tejes italokhoz is kiváló.',
            'image' => 'cerrado.jpg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Tolima',
            'origin' => 'Kolumbia',
            'region' => 'Tolima',
            'type' => 'Szemes kávé',
            'detail' => 'közepes pörkölés',
            'description' => 'Kiegyensúlyozott kolumbiai kávé barnacukros édességgel és enyhe narancsos savassággal. Mindennapi kedvenc szűrős kávéfőzőhöz.',
            'image' => 'tolima.jpg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Monsooned Malabar',
            'origin' => 'India',
            'region' => 'Malabar',
            'type' => 'Szemes kávé',
            'detail' => 'sötét pörkölés',
            'description' => 'Monszun szelében érlelt indiai kávé, teltebb testtel, fűszeres és földes ízekkel, alig savas. Eszpresszóhoz és French presshez ajánljuk.',
            'image' => 'monsooned-malabar.jpg',
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Supremo',
            'origin' => 'Kolumbia',
            'region' => 'Nariño',
            'type' => 'Őrölt kávé',
            'detail' => 'közepes pörkölés',
            'description' => 'Kiegyensúlyozott, lágy ízű kolumbiai kávé karamell és dió jegyekkel. Közepesre őrölve érkezik, filteres kávéfőzőhöz és French presshez is jó.',
            'image' => 'supremo.jpg',
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Mogiana',
            'origin' => 'Brazília',
            'region' => 'Mogiana',
            'type' => 'Őrölt kávé',
            'detail' => 'közepes pörkölés',
            'description' => 'Csokoládés, mandulás brazil kávé lágy testtel. Őrölve érkezik, kotyogóshoz és filteres kávéfőzőhöz is jó.',
            'image' => 'mogiana.jpg',
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Decaf Huila',
            'origin' => 'Kolumbia',
            'region' => 'Huila',
            'type' => 'Őrölt kávé',
            'detail' => 'koffeinmentes',
            'description' => 'Természetes eljárással koffeinmentesített kolumbiai kávé, megőrzött karamellás ízekkel. Délutánra és estére is bátran fogyasztható.',
            'image' => 'decaf-huila.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Matcha',
            'origin' => 'Japán',
            'region' => 'Uji',
            'type' => 'Zöld tea',
            'detail' => 'porított',
            'description' => 'Finomra őrölt japán zöld tea, élénk zöld színnel és krémes, umami ízzel. Habverővel készítsd 70 °C-os vízzel, vagy keverd tejhez.',
            'image' => 'matcha.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Genmaicha',
            'origin' => 'Japán',
            'region' => 'Kagoshima',
            'type' => 'Zöld tea',
            'detail' => 'pirított rizzsel',
            'description' => 'Japán zöld tea pirított barna rizzsel, diós, pattogatott kukoricás illattal és lágy, kerek ízzel. Enyhe, nyugtató ital.',
            'image' => 'genmaicha.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Gyokuro',
            'origin' => 'Japán',
            'region' => 'Yame',
            'type' => 'Zöld tea',
            'detail' => 'árnyékban nevelt',
            'description' => 'Szüret előtt árnyékolt japán zöld tea, mély umami ízzel és édes, tengeri utóízzel. Alacsony hőmérsékletű vízzel készítsd.',
            'image' => 'gyokuro.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Hojicha',
            'origin' => 'Japán',
            'region' => 'Kyoto',
            'type' => 'Zöld tea',
            'detail' => 'pirított',
            'description' => 'Pirított japán zöld tea, vöröses-barna színnel, karamellás, diós ízzel és alacsony koffeintartalommal. Estére is jó választás.',
            'image' => 'hojicha.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Assam',
            'origin' => 'India',
            'region' => 'Assam',
            'type' => 'Fekete tea',
            'detail' => 'szálas',
            'description' => 'Erőteljes, maláta ízű fekete tea, sötét borostyán színnel. Tejjel és cukorral is finom, reggelire ajánljuk. 95 °C-os vízzel készítsd, 3–4 percig áztasd.',
            'image' => 'assam.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Nilgiri',
            'origin' => 'India',
            'region' => 'Nilgiri',
            'type' => 'Fekete tea',
            'detail' => 'szálas',
            'description' => 'Élénk, gyümölcsös indiai fekete tea rézszínű csészével és üde, enyhén citrusos ízzel. Jegesteának is kiváló.',
            'image' => 'nilgiri.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Masala chai',
            'origin' => 'India',
            'region' => 'Kerala',
            'type' => 'Fekete tea',
            'detail' => 'fűszeres keverék',
            'description' => 'Erős fekete tea kardamommal, fahéjjal, szegfűszeggel és gyömbérrel. Tejjel főzve az indiai chai klasszikus íze.',
            'image' => 'masala-chai.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Erdei gyümölcs',
            'origin' => 'Magyarország',
            'region' => 'Mátra',
            'type' => 'Gyümölcstea',
            'detail' => 'szálas',
            'description' => 'Magyar gyümölcstea szárított erdei gyümölcsökből, koffeinmentes. Forrón és jegesen is finom.',
            'image' => 'erdei-gyumolcs.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Almás-fahéjas',
            'origin' => 'Magyarország',
            'region' => 'Zempléni-hegység',
            'type' => 'Gyümölcstea',
            'detail' => 'szálas',
            'description' => 'Szárított almadarabokból és fahéjból készült, meleg ízű gyümölcstea. Koffeinmentes, hideg estékre ideális.',
            'image' => 'almas-fahejas.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Csipkebogyós hibiszkusz',
            'origin' => 'Magyarország',
            'region' => 'Bakony',
            'type' => 'Gyümölcstea',
            'detail' => 'szálas',
            'description' => 'Savanykás, élénk piros gyümölcstea csipkebogyóval és hibiszkusszal. Koffeinmentes, forrón és jegesen is kiváló.',
            'image' => 'csipkebogyos-hibiszkusz.jpg',
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Fém teaszűrő',
            'origin' => null,
            'region' => null,
            'type' => 'Kiegészítő',
            'detail' => 'rozsdamentes acél',
            'description' => 'Rozsdamentes acél, többször használható teaszűrő finom szemű hálóval. Egy csészényi szálas teához, mosogatógépben is mosható.',
            'image' => 'fem-teaszuro.jpg',
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Kézi kávédaráló',
            'origin' => null,
            'region' => null,
            'type' => 'Kiegészítő',
            'detail' => 'kerámia darálókővel',
            'description' => 'Kézi kávédaráló állítható szemcsemérettel, kerámia darálókővel. Szemes kávék frissen őrléséhez, utazáshoz is kényelmes.',
            'image' => 'kezi-kavedaralo.jpg',
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Dugattyús kávéfőző',
            'origin' => null,
            'region' => null,
            'type' => 'Kiegészítő',
            'detail' => '600 ml, hőálló üveg',
            'description' => 'Klasszikus French press hőálló üvegkannával és rozsdamentes dugattyúval. Durvára őrölt kávéhoz, 4 percnyi áztatással.',
            'image' => 'dugattyus-kavefozo.jpg',
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Kerámia bögre',
            'origin' => null,
            'region' => null,
            'type' => 'Kiegészítő',
            'detail' => 'matt fekete, 300 ml',
            'description' => 'Matt fekete kerámia bögre, 300 ml-es. Kávéhoz és teához is jó, mosogatógépben és mikrohullámú sütőben is használható.',
            'image' => 'keramia-bogre.jpg',
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'V60 kávécsepegtető',
            'origin' => null,
            'region' => null,
            'type' => 'Kiegészítő',
            'detail' => 'kerámia, 1–2 csészés',
            'description' => 'Kerámia kúpos kávécsepegtető kézi főzéshez, 1–2 csésze kávéhoz. Papírszűrővel használható, hőtartó és könnyen tisztítható.',
            'image' => 'v60-csepegteto.jpg',
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Matcha habverő készlet',
            'origin' => null,
            'region' => null,
            'type' => 'Kiegészítő',
            'detail' => 'bambusz habverő és kanál',
            'description' => 'Hagyományos matcha készítő készlet bambusz habverővel (chasen), bambusz kanállal (chashaku) és kerámia tálkával.',
            'image' => 'matcha-habvero-keszlet.jpg',
        ]);
    }
}
