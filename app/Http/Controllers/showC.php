<?php

namespace App\Http\Controllers;

use App\Models\undanganM;
use App\Models\sebarundanganM;
use Illuminate\Http\Request;

class showC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $kode, $kodepenerima)
    {
        $undangan = undanganM::where('kode', $kode)->firstOrFail();
        $penerima = sebarundanganM::where(['kodepenerima' => $kodepenerima, "idundangan" => $undangan->idundangan])->firstOrFail();

        $text1 = [
            "Dengan memohon rahmat dan ridho Allah SWT <br>
            Izinkan kami bermaksud berbagi kebahagiaan dengan menyelenggarakan pernikahan putra-putri kami. Insyaallah akan diselenggarakan pada:"
        ];
        $lokasi = [
            "Yang akan berlangsung di kediaman Bpk. Ratoni dan Ibu Carsiyah <br>
            (Kp. Lembah Cahaya, RT02/RW02)"
        ];
        $text2 = [
            "Tiada yang dapat terungkap selain ucap syukur dari lubuk hati yang paling dalam apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu kepada mempelai,<br>
            Atas kehadirannya kami ucapkan terimakasih"
        ];
        $textbank = [
            "Doa restu dari Bapak/Ibu/Saudara/i adalah anugerah terindah bagi kami. <br>
Jika berkenan memberikan tanda kasih, dapat disalurkan melalui rekening berikut."
        ];

        $doas1 = [
            "islam" => [
                ["QS. Ar-Rum: 21", "Dia menciptakan pasangan untukmu dari jenismu sendiri, agar kamu merasa tenteram kepadanya."],
                ["QS. Al-Furqan: 74", "Ya Tuhan kami, anugerahkanlah kepada kami pasangan dan keturunan sebagai penyenang hati."],
                ["QS. Az-Zariyat: 49", "Dan segala sesuatu Kami ciptakan berpasang-pasangan agar kamu mengingat kebesaran Allah."],
                ["QS. An-Naba: 8", "Dan Kami menciptakan kamu berpasang-pasangan."],
                ["QS. An-Nur: 32", "Jika mereka miskin, Allah akan memampukan mereka dengan karunia-Nya. Allah Maha Luas lagi Maha Mengetahui."],
                ["Doa Restu", "Barakallahu lakum wa baraka 'alaikum, wa jama'a bainakuma fii khair (Semoga Allah memberkahi kalian dalam kebaikan)."]
            ],
            "kristen" => [
                ["1 Korintus 13:13", "Demikianlah tinggal ketiga hal ini, yaitu iman, pengharapan dan kasih, dan yang paling besar di antaranya ialah kasih."],
                ["Efesus 4:2", "Hendaklah kamu selalu rendah hati, lemah lembut, dan sabar. Tunjukkanlah kasihmu dalam hal saling membantu."],
                ["Pengkhotbah 4:9", "Berdua lebih baik dari pada seorang diri, karena mereka menerima upah yang baik dalam jerih payah mereka."],
                ["Kolose 3:14", "Dan di atas semuanya itu: kenakanlah kasih, sebagai pengikat yang mempersatukan dan menyempurnakan."],
                ["1 Yohanes 4:18", "Di dalam kasih tidak ada ketakutan: kasih yang sempurna melenyapkan ketakutan."]
            ],
            "katolik" => [
                ["Matius 19:6", "Demikianlah mereka bukan lagi dua, melainkan satu. Karena itu, apa yang telah dipersatukan Allah, tidak boleh diceraikan manusia."],
                ["Yohanes 15:12", "Inilah perintah-Ku, yaitu supaya kamu saling mengasihi, sama seperti Aku telah mengasihi kamu."],
                ["1 Korintus 13:4", "Kasih itu sabar; kasih itu murah hati; ia tidak cemburu. Ia tidak memegahkan diri dan tidak sombong."],
                ["Kid. Agung 8:7", "Air yang banyak tak dapat memadamkan kasih, sungai-sungai tak dapat menghanyutkannya."]
            ],
            "hindu" => [
                ["Rg Veda X.85.42", "Tinggallah di sini, janganlah terpisah, capailah masa hidup penuh, bermain dengan anak cucu, bergembira di rumah sendiri."],
                ["Atharvaveda XIV.2.71", "Aku adalah itu, engkau adalah ini. Aku adalah langit, engkau adalah bumi. Aku adalah lagu, engkau adalah baitnya."],
                ["Grhastha Asrama", "Semoga Tuhan Yang Maha Esa melimpahkan anugerah-Nya agar kalian tetap bersatu dalam kasih dan darma."]
            ],
            "budha" => [
                ["Dhammapada 204", "Kesehatan adalah keuntungan terbesar, kepuasan adalah kekayaan terbesar, kepercayaan adalah saudara terbaik."],
                ["Sigalovada Sutta", "Suami dan istri hendaknya saling menghargai, setia, dan bekerja sama dalam kebajikan untuk kebahagiaan bersama."],
                ["Metta Sutta", "Semoga semua makhluk hidup berbahagia, bebas dari penderitaan, dan hidup dalam kerukunan."]
            ],
            "umum" => [
                ["Kahlil Gibran", "Cinta tidak memiliki apa pun dan tidak ingin dimiliki, karena cinta telah cukup bagi cinta itu sendiri."],
                ["Pepatah", "Pernikahan bukanlah tempat untuk mencari kebahagiaan, melainkan tempat untuk saling berbagi kebahagiaan."],
                ["Kutipan", "Dua jiwa namun satu pikiran, dua hati namun satu denyut."]
            ]
        ];

        
        return view('index', [
            'undangan' => $undangan,
            'text1' => $text1[array_rand($text1)],
            'doas' => $doas1,
            "penerima" => $penerima,
            "kode" => $kode,
            "kodepenerima" => $kodepenerima,
            "lokasi" => $lokasi[array_rand($lokasi)],
            "text2" => $text2[array_rand($text2)],
            "textbank" => $textbank[array_rand($textbank)]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(undanganM $undanganM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(undanganM $undanganM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, undanganM $undanganM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(undanganM $undanganM)
    {
        //
    }
}
