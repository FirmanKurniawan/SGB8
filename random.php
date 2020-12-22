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
'Selalu ada hari baru untuk setiap napas. Selalu ada kesempatan baru untuk kembali tersenyum. Patah hati tidak harus selamanya, kan?',
'Kamu boleh jatuh cinta kepada siapa saja, tapi kamu tidak punya hak memaksakan orang lain mencintaimu.',
'Hidup tanpa cinta layaknya pohon tanpa bunga dan buah.',
'Kau akan tahu bahwa kau sedang jatuh cinta ketika kau tidak ingin jatuh tertidur karena realitas tampak lebih indah daripada mimpi.',
'Cewek itu paling pinter nutup-nutupin! Kalo dia lg sedih, dia slalu bs nunjukkin dirinya gapapa.. Padahal mah dia lg kenapa-kenapa.',
'Trauma adalah bagian dari rasa sakit yg terlalu dalam.',
'Sekuat-kuatnya orang kalo di sakitin terus pasti bakalan rapuh juga.',
'Saya bukannya tidak punya airmata, saya hanya menahan airmata untuk tidak mengalir.',
'Perasaan aku ke kamu daridulu gak berubah2! Msh tetep syg sama kamu.. Walaupun kadang kamu itu nyakitin banget.',
'Maafin aku yaa.. Aku gagal jadi yg terbaik buat kamu.',
'Kalo harus jadi orang jahat, aku bisa aja jahat sama kamu! Tapi aku masih mikirin perasaan oranglain. Gak kaya kamu!',
'Diamnya aku bukan berarti aku gak tau apa-apa! Tapi walaupun diam, aku selalu mantau kamu disini.',
'Sebutin nama orang-orang yg lo sayang. ',
'Semua orang pasti punya masalalu. Tapi gak seharusnya lo stuck di masalalu lo itu!',
'Sabar teruss.. Sampe orang yg di sabarin sadar!',
'Maafin aku. Aku blm bs jd yg terbaik buat kamu. Tapi aku slalu berusaha! Dan kamu, hanya menganggap usaha aku sebelah mata saja.',
'Cuma aku dan Tuhan yg tau gimana perasaan aku ke kamu.',
'Move on itu nggak bakal ada habisnya! contoh: udh bs move on dr yg ini, eh ntar pacaran, putus lg, trs susah buat move on dr yg itu.',
'Cewek itu jarang bisa marah sama orang yg dia sayang. Terkadang emosi nya hanya bisa di luapkan lewat "air mata".',
'Orang cakep, banyak! Tapi orang cakep, baik+setia jarang-jarang.',
'Gue jutek juga sebenernya sayang sama lo.',
'Pertahankan orang yg pantes buat lo pertahanin. Jgn mempertahankan orang yg salah!',
'Ngomong sih gampang, ngelakuinnya itu nggak segampang ngomong.',
'Sekali sayang, tetep sayang.',
'Maaf kalo aku ngebetein terus.',
'Satnight mau kemana nih?', 
'Kangen banget sebenernya.. Tapi gitudeh.'
);

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
$post = 'authenticity_token='.$auth.'&batch_mode=off&is_permalink_page=false&place_id=&status='.$quotes[rand(0, 30)].' ('.rand(1111,9999).') Happy+anniversary+yang+ke+8th+%F0%9F%8E%89%0A%23AnniversarySGBTeam8th%0A%23SGBTeam%0A%23SGBTeamAnniversary8th%0A%23SGBTeamAnniversary8&tagged_users=';

$post = json_decode(yarzCurl($url, $post, false, $headers, true));
if(isset($post->tweet_id))
{
    echo "Tweet ID : ".$post->tweet_id."\n";
	sleep(5);
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
