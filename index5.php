<?php
require 'SendGrid-API/vendor/autoload.php';
$shouldSend = ($_GET["mode"] == "prod");
if ($shouldSend)
	echo "will send emails\n";
else
	echo "test mode\n";

	
$oku = fopen("mails/tekrar.txt",'r'); 
while(!feof($oku)){  
	$email = fgets($oku);
	$email = trim($email);
	try {
		
		$from = new SendGrid\Email("IEEE Türkiye Computer Society", "ieeextremecamp@gmail.com");
		$subject = "IEEEXtreme Türkiye Kampı '19 - Tekrar Asil Kayıt Hatırlatma";
		$to = new SendGrid\Email("IEEEXtreme Türkiye Kampı '19", $email);
		$content = new SendGrid\Content("text/html", "<center><img src='http://ieeextreme.ieeeturkeycs.org/XtremeLogo.png'>
		<h4><br>
		IEEEXtreme Türkiye Kampı'na göstermiş olduğunuz ilgi için teşekkür ederiz.<br>
		Yapılan ön eleme yarışması ve alınan referanslar doğrultusunda asil olarak kampa katılmaya hak kazandınız.<br>
		Kampımız 21-25 Ocak tarihinde Marmara Üniversitesi Göztepe Kampüsünde gerçekleşecektir.<br>
		Kampımız 5 günden oluşacaktır. Kampı tamamlayan katılımcılarımıza katılım sertifikası verilecektir.<br>
		Detaylı program tarafınıza gönderilecektir.<br>
		<b>Asil kayit formunun 15 Ocak Salı gününe kadar doldurulması zorunludur.<b><br>
		https://goo.gl/forms/NzDmxFVo8Ah7YuT92 <br><br>
		Konaklamalı katılımcılar için;<br>
		21-22-23-24 Ocak aralığında hostelde kalınacaktır.<br>
		Ücret: 180 Türk Lirasıdır.<br>
		Konaklama ücretleri <b>15 Ocak Salı günü saat 18:00'a<b> kadar aşağıdaki hesaplara aktarılmalıdır.<br>
		Konaklama ücretlerine açıklama olarak kendi isim ve soyisminiz yazılmalıdır.<br><br>
		BATUHAN EMEN Ziraat Bankası;<br>
		TEKNOPARK/İSTANBUL ŞUBESİ<br>
		2487-80871327-5004<br>
		TR 9200 0100 2487 8087 1327 5004<br>
		<br>
		Metin Yıldız Yapı Kredi Bankası;<br>
		TR 7500 0670 1000 0000 5565 2692<br>
		Not: Eft ücretlerine dikkat ediniz.
		<br>
		<br>
		Sorularınız için ieeextremecamp@gmail.com adresinden bize ulaşabilirsiniz.<br>
		
		
		
		
		Bilgilendirmelerimiz devam edecektir.<br>
		Maillerinizi kontrol etmeyi unutmayınız.<br>
		İyi günler dileriz.<br>
		</h4>
		<a href='https://instagram.com/xtremekamp'> <img border='0' src='http://ieeextreme.ieeeturkeycs.org/sosyalmedya/instagram.png'></a>
		<a href='https://facebook.com/xtremekamp'> <img border='0' src='http://ieeextreme.ieeeturkeycs.org/sosyalmedya/facebook.png'></a>
		<a href='https://twitter.com/xtremekamp'> <img border='0' src='http://ieeextreme.ieeeturkeycs.org/sosyalmedya/twitter.png'></a> <br> <br>
		<img src='http://ieeextreme.ieeeturkeycs.org/tumlogolar1.jpg'> 
		</center>");
		/*Send the mail*/
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = ('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');
		$sg = new \SendGrid($apiKey);
		/*Response*/
		
		if ($shouldSend)
			$response = $sg->client->mail()->send()->post($mail);
		echo "sent " . $email . "\n";
	} catch (Exception $e) {
		echo "cannot sent " . $email . "\n";
	}
} 
fclose($oku);  

?>