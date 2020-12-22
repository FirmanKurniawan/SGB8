<?php
echo 'Cookie: ';
$cookie = trim(fgets(STDIN));
echo 'Auth Token: ';
$auth = trim(fgets(STDIN));

$quotes=array(
'Enjoy Life',
'A liar always a liar',
'Nature learns',
'Live long',
'God is truth',
'Jika kamu menunggu sesuatu terjadi, kamu sudah terlambat.',
'Kamu tidak bisa mekar begitu cepat, kamu harus tumbuh dulu.',
'Hidup itu seperti resep dengan semua bahan yang sempurna.',
'Saya berharap saya bisa kembali ke hari-hari buruk dan mempelajari pelajaran yang saya lewatkan.',
'Jelajahi hal-hal baru dan belajar darinya karena hidup ini terlalu singkat.',
'Diam adalah jawaban terbaik dari semua pertanyaan bodoh, dan senyum adalah reaksi terbaik dalam semua situasi kritis.',
'Beberapa orang berpura-pura kuat, tapi mereka hancur di dalam.',
'Lebih baik menangis di tengah hujan sehingga tidak ada yang bisa mengerti bahwa kamu bahagia atau kesakitan.',
'Jangan pernah berhenti menunjukkan kepada seseorang betapa mereka sangat berarti bagimu.',
'Saya menangis karena saya tidak punya sepatu, lalu saya bertemu dengan seorang pria yang tidak punya kaki.',
'Kuhancurkan tulang-tulangku, tetapi aku tidak membuangnya, sampai aku mendengar suara cinta memanggilku dan melihat jiwaku siap untuk berpetualang.',
'Berasumsi dengan perasaan, sama saja dengan membiarkan hatimu diracuni harapan baik, padahal boleh jadi kenyataan tidak seperti itu, menyakitkan.',
'Sebab, aku tahu cinta terbaik akan selalu pulang. Jika kau tak kunjung datang, barangkali kau hanya ditakdirkan sebagai kisah yang hanya layak tersimpan sebagai kenangan.',
'Kadang, yang terindah tak diciptakan untuk dimiliki. Cukup dipandangi dari jauh, lalu disyukuri bahwa ia ada di sana untuk dikagumi dalam diam.',
'Selalu ada hari baru untuk setiap napas. Selalu ada kesempatan baru untuk kembali tersenyum. Patah hati tidak harus selamanya, kan?',
'Kamu boleh jatuh cinta kepada siapa saja, tapi kamu tidak punya hak memaksakan orang lain mencintaimu.',
'Begitulah perasaan, saat dia memilih jatuh di hatimu, kau hanya punya dua pilihan. Mengambilnya dan menyatakan, atau membiarkan waktu membuatnya hilang dan mungkin diambil orang lain.',
'Tugasmu bukan untuk mencari cinta, tapi hanya untuk mencari dan menemukan semua hambatan dalam dirimu yang secara tidak sadar telah kau bangun untuk melawan cinta.',
'Hidup tanpa cinta layaknya pohon tanpa bunga dan buah.',
'Kau akan tahu bahwa kau sedang jatuh cinta ketika kau tidak ingin jatuh tertidur karena realitas tampak lebih indah daripada mimpi.'
);
$random_no = rand(0, 20);
$quote = $quotes[$random_no];

while(true)
{
$headers = array();
$headers[] = 'Cookie: '.$cookie;
$headers[] = "Origin: https://twitter.com";
$headers[] = "Accept-Encoding: gzip, deflate, br";
$headers[] = "Accept-Language: en-US,en;q=0.9";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
$headers[] = "Accept: application/json, text/javascript, */*; q=0.01";
$headers[] = "Referer: https://twitter.com/";
$headers[] = "Authority: twitter.com";
$headers[] = "X-Requested-With: XMLHttpRequest";
$headers[] = "X-Twitter-Active-User: yes";
$url = 'https://twitter.com/i/tweet/create';
$post = 'authenticity_token='.$auth.'&batch_mode=off&is_permalink_page=false&place_id=&status='.$quote.' ('.rand(1111,9999).') Happy+anniversary+yang+ke+8th+%F0%9F%8E%89%0A%23AnniversarySGBTeam8th%0A%23SGBTeam%0A%23SGBTeamAnniversary8th%0A%23SGBTeamAnniversary8&tagged_users=';

$post = json_decode(yarzCurl($url, $post, false, $headers, true));
if(isset($post->tweet_id))
{
    echo "Tweet ID : ".$post->tweet_id."\n";
	sleep(50);
} else {
	die(print_r($post));
}
}

function yarzCurl($url, $fields=false, $cookie=false, $httpheader=false, $encoding=false)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	if($fields !== false)
	{
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	}
	if($encoding !== false)
	{
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
	}
	if($cookie !== false)
	{
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
	}
	if($httpheader !== false)
	{
		curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
	}
	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}
