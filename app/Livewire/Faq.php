<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Faq extends Component
{
    public $openIndex = null;

    public function toggle($index)
    {
        $this->openIndex = $this->openIndex === $index ? null : $index;
    }

    public function render()
    {
        $faqs = [
            [
                'question' => 'Apa itu Homespire?',
                'answer' => 'Homespire adalah platform berbagi inspirasi dekorasi rumah yang memungkinkan Anda menemukan, menyimpan, dan berbagi ide-ide dekorasi untuk berbagai ruangan di rumah Anda.'
            ],
            [
                'question' => 'Bagaimana cara upload inspirasi?',
                'answer' => 'Untuk upload inspirasi, Anda perlu login terlebih dahulu. Kemudian klik menu "Upload" di navigasi, isi form dengan detail inspirasi seperti judul, deskripsi, gambar, dan informasi lainnya. Setelah disubmit, inspirasi Anda akan di-review oleh admin sebelum dipublikasikan.'
            ],
            [
                'question' => 'Apakah saya bisa menyimpan inspirasi favorit?',
                'answer' => 'Ya, Anda bisa menyimpan inspirasi favorit dengan klik tombol bintang (star) pada setiap inspirasi. Inspirasi yang Anda simpan bisa diakses kapan saja dari dashboard Anda.'
            ],
            [
                'question' => 'Bagaimana cara mencari inspirasi tertentu?',
                'answer' => 'Di halaman Galeri, Anda bisa menggunakan fitur pencarian berdasarkan kata kunci, filter berdasarkan ruangan (Ruang Tamu, Kamar Tidur, dll), atau filter berdasarkan gaya desain (Minimalis, Modern, Klasik, dll). Anda juga bisa mengurutkan hasil berdasarkan tanggal terbaru atau terlama.'
            ],
            [
                'question' => 'Apakah gratis untuk menggunakan Homespire?',
                'answer' => 'Ya, Homespire sepenuhnya gratis untuk digunakan. Anda bisa melihat, menyimpan, dan berbagi inspirasi tanpa biaya apapun.'
            ],
            [
                'question' => 'Bagaimana jika saya menemukan konten yang tidak pantas?',
                'answer' => 'Jika Anda menemukan konten yang tidak pantas atau melanggar aturan, Anda bisa melaporkannya dengan mengklik tombol "Laporkan" pada inspirasi tersebut. Tim moderasi kami akan meninjau laporan Anda dan mengambil tindakan yang diperlukan.'
            ],
            [
                'question' => 'Berapa lama proses review inspirasi yang saya upload?',
                'answer' => 'Tim moderasi kami akan me-review inspirasi yang Anda upload dalam waktu maksimal 1-2 hari kerja. Anda akan menerima notifikasi jika inspirasi Anda disetujui atau ditolak.'
            ],
            [
                'question' => 'Bisakah saya mengedit atau menghapus inspirasi yang sudah saya upload?',
                'answer' => 'Saat ini fitur edit inspirasi belum tersedia. Jika Anda ingin menghapus atau mengubah inspirasi, silakan hubungi kami melalui WhatsApp atau email support.'
            ],
            [
                'question' => 'Bagaimana cara menghubungi tim Homespire?',
                'answer' => 'Anda bisa menghubungi kami melalui WhatsApp yang tersedia di bagian footer website, atau mengirim email ke info@homespire.com. Kami akan merespons pertanyaan Anda secepatnya.'
            ],
        ];

        return view('livewire.faq', ['faqs' => $faqs]);
    }
}
