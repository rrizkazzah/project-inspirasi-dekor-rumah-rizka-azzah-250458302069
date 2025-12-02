<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => '10 Tips Menata Ruang Tamu Minimalis yang Nyaman',
                'slug' => 'tips-menata-ruang-tamu-minimalis',
                'content' => "Ruang tamu adalah area pertama yang dilihat tamu saat berkunjung ke rumah Anda. Berikut adalah 10 tips untuk menata ruang tamu minimalis yang nyaman:\n\n1. Pilih Furnitur Multifungsi\nGunakan sofa bed atau meja dengan storage tersembunyi untuk menghemat ruang.\n\n2. Warna Netral Mendominasi\nPilih warna-warna netral seperti putih, krem, atau abu-abu untuk kesan luas.\n\n3. Maksimalkan Pencahayaan Alami\nBuka jendela lebar dan gunakan tirai tipis agar cahaya masuk maksimal.\n\n4. Tambahkan Cermin\nCermin besar dapat menciptakan ilusi ruangan yang lebih luas.\n\n5. Dekorasi Minimalis\nHindari terlalu banyak dekorasi. Pilih beberapa item statement yang berkualitas.\n\n6. Atur Sirkulasi Udara\nPastikan ada ruang cukup untuk berjalan dan ventilasi yang baik.\n\n7. Tanaman Hias Kecil\nTambahkan 1-2 tanaman hias untuk kesegaran ruangan.\n\n8. Storage Tersembunyi\nGunakan rak dinding atau lemari built-in untuk menyimpan barang.\n\n9. Karpet Sederhana\nPilih karpet dengan motif simple yang sesuai dengan warna ruangan.\n\n10. Konsisten dengan Tema\nPastikan semua elemen sejalan dengan konsep minimalis yang Anda pilih.",
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'DIY: Cara Membuat Rak Dinding dari Kayu Bekas',
                'slug' => 'diy-rak-dinding-kayu-bekas',
                'content' => "Ingin membuat rak dinding sendiri dengan budget hemat? Berikut tutorial lengkapnya:\n\nBahan yang Dibutuhkan:\n- Kayu bekas/pallet (ukuran sesuai kebutuhan)\n- Bracket rak besi\n- Cat kayu (warna sesuai selera)\n- Amplas\n- Bor listrik\n- Sekrup\n- Waterpass\n- Pensil\n\nLangkah-langkah:\n\n1. Persiapan Kayu\nBersihkan kayu bekas dari paku atau kotoran. Amplas hingga halus.\n\n2. Potong Sesuai Ukuran\nUkur dan potong kayu sesuai panjang rak yang diinginkan.\n\n3. Pengecatan\nCat kayu dengan warna pilihan Anda. Tunggu hingga kering sempurna.\n\n4. Pasang Bracket\nTandai posisi bracket di dinding menggunakan waterpass agar rata.\n\n5. Bor dan Pasang\nBor lubang di dinding, pasang bracket dengan kuat.\n\n6. Pasang Papan Kayu\nLetakkan papan kayu di atas bracket dan kencangkan dengan sekrup.\n\n7. Finishing\nPeriksa kestabilan rak dan tambahkan dekorasi sesuai selera.\n\nTips Tambahan:\n- Gunakan kayu dengan ketebalan minimal 2cm untuk kekuatan\n- Pastikan bracket menempel pada bagian dinding yang kokoh\n- Untuk tampilan rustic, biarkan tekstur kayu natural terlihat\n\nBiaya total: Rp 50.000 - 100.000 (tergantung ukuran dan material)",
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Tren Warna Cat Rumah 2025: Dari Earthy Tone hingga Bold Colors',
                'slug' => 'tren-warna-cat-rumah-2025',
                'content' => "Tahun 2025 membawa tren warna cat rumah yang menarik. Berikut adalah warna-warna yang akan populer:\n\n1. Earthy Tones\nWarna-warna tanah seperti terracotta, clay, dan warm beige menjadi favorit. Warna ini memberikan kehangatan dan ketenangan.\n\n2. Sage Green\nHijau sage yang soft dan menenangkan cocok untuk kamar tidur dan ruang kerja.\n\n3. Navy Blue\nBiru navy yang elegan cocok untuk ruang tamu atau home office yang profesional.\n\n4. Warm Taupe\nTaupe hangat menjadi pilihan netral yang lebih sophisticated dari beige biasa.\n\n5. Terracotta\nOrange kemerahan ini membawa nuansa mediterania yang hangat dan welcoming.\n\n6. Dusty Pink\nPink lembut ini cocok untuk kamar tidur dengan nuansa feminin modern.\n\n7. Charcoal Gray\nAbu-abu gelap memberikan kesan modern dan bisa dikombinasikan dengan warna bold.\n\nTips Memilih Warna:\n- Pertimbangkan pencahayaan ruangan\n- Test warna di area kecil terlebih dahulu\n- Kombinasikan dengan warna komplementer\n- Sesuaikan dengan furnitur yang ada\n\nKombinasi Populer 2025:\n- Sage Green + Warm White\n- Terracotta + Cream\n- Navy Blue + Gold Accent\n- Charcoal + Dusty Pink",
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Panduan Lengkap Memilih Furnitur untuk Kamar Tidur Kecil',
                'slug' => 'panduan-furnitur-kamar-tidur-kecil',
                'content' => "Kamar tidur kecil bukan berarti tidak bisa nyaman dan fungsional. Berikut panduan memilih furnitur yang tepat:\n\nTempat Tidur:\n- Pilih ukuran yang sesuai (single/queen)\n- Pertimbangkan tempat tidur dengan storage di bawahnya\n- Platform bed lebih hemat ruang dibanding dipan tinggi\n\nLemari:\n- Built-in wardrobe lebih efisien\n- Pintu sliding menghemat ruang\n- Manfaatkan tinggi langit-langit untuk storage\n\nMeja Rias/Kerja:\n- Pilih yang bisa dilipat atau multifungsi\n- Floating desk menghemat ruang lantai\n- Cermin dengan storage tersembunyi\n\nNakas/Bedside Table:\n- Pilih yang ramping dan tinggi\n- Model wall-mounted juga pilihan bagus\n- Maksimal 1-2 laci sudah cukup\n\nPencahayaan:\n- Lampu dinding menghemat space di nakas\n- String lights untuk dekorasi\n- Natural light maksimalkan dengan tirai tipis\n\nTips Penataan:\n1. Ukur ruangan dengan teliti sebelum membeli\n2. Buat skala ruangan di kertas\n3. Prioritaskan furnitur esensial\n4. Gunakan warna terang untuk kesan luas\n5. Cermin besar menciptakan ilusi ruang\n\nBudget Estimasi:\n- Tempat Tidur + Kasur: 2-5 juta\n- Lemari 2 pintu: 1.5-3 juta\n- Meja + Kursi: 500rb-1.5 juta\n- Nakas: 200-500rb\n- Dekorasi: 500rb-1 juta\n\nTotal: 4.7 - 11 juta (bisa lebih hemat dengan DIY atau second)",
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Cara Mendesain Dapur Modern dengan Budget Terbatas',
                'slug' => 'desain-dapur-modern-budget-terbatas',
                'content' => "Dapur modern tidak selalu mahal. Berikut cara mewujudkannya dengan budget terbatas:\n\nKitchen Set:\n- Pertimbangkan kitchen set pre-made daripada custom\n- HPL lebih terjangkau dibanding kayu solid\n- Fokus pada cabinet bawah, atas bisa pakai rak open\n\nBacksplash:\n- Subway tiles lebih murah dan timeless\n- Alternatif: cat waterproof atau sticker tiles\n- Area kecil di belakang kompor sudah cukup\n\nCountertop:\n- Granit tile lebih murah dari slab\n- Solid surface lokal kualitas baik harga terjangkau\n- HPL motif marmer juga opsi bagus\n\nAppliances:\n- Beli yang benar-benar dibutuhkan\n- Kompor tanam + cooker hood sudah cukup modern\n- Kulkas dan microwave bisa second berkualitas\n\nPencahayaan:\n- LED strip di bawah cabinet atas\n- Downlight sederhana di langit-langit\n- Lampu pendant di meja makan (opsional)\n\nPenyimpanan:\n- Rak terbuka untuk display cantik\n- Magnetic knife strip di dinding\n- Gantungan untuk alat masak\n\nWarna:\n- Putih + kayu = kombinasi murah meriah tapi elegan\n- Aksen warna di backsplash atau accessories\n- Hindari terlalu banyak warna\n\nBudget Breakdown (Dapur 2x3m):\n- Kitchen Set HPL: 5-8 juta\n- Backsplash: 500rb-1 juta\n- Countertop: 1-2 juta\n- Kompor + Hood: 1.5-3 juta\n- Sink + Faucet: 500rb-1 juta\n- Lighting: 500rb-1 juta\n- Accessories: 500rb\n\nTotal: 9.5 - 16.5 juta\n\nTips Hemat:\n1. Beli saat ada promo/sale\n2. Nego dengan kontraktor\n3. DIY untuk hal-hal sederhana\n4. Prioritaskan kualitas untuk item penting\n5. Beli bertahap jika budget terbatas",
                'published_at' => now()->subDays(1),
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
