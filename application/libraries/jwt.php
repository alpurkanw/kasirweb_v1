<?php

class Jwt
{

	private $secretkey = 'J4ng4n_k4sih_0r4ng@daffa2010'; // secretkey untuk generate signature
	private $file = 'assets/jwt.json'; // file json

	public function generate_jwt($payload)
	{
		try {
			// Buat Array untuk header lalu convert menjadi JSON
			$header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
			// Encode header menjadi Base64Url String
			$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

			// Buat Array payload lalu convert menjadi JSON
			$payload = json_encode($payload);
			// Encode Payload menjadi Base64Url String
			$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

			// Buat Signature dengan metode HMAC256
			$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $this->secretkey, true);
			// Encode Signature menjadi Base64Url String
			$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

			// Gabungkan header, payload dan signature dengan tanda titik (.)
			$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

			// baca data
			$content = json_decode(file_get_contents($this->file), true);

			// isi file kosong
			if ($content == '') {
				$content = [];
				// push array
				array_push($content, $jwt);
				// tulis data ke file
				if (file_put_contents($this->file, json_encode($content, JSON_PRETTY_PRINT))) {
					echo $jwt;
				} else {
					echo "gagal menyimpan data";
				}
			} else {
				// jika JWT sudah ada maka tampilkan gaga,jika tidak maka simpan jwt
				if (in_array($jwt, $content)) {
					return $jwt;
				} else {
					// push array
					array_push($content, $jwt);
					// tulis data ke file
					if (file_put_contents($this->file, json_encode($content, JSON_PRETTY_PRINT))) {
						return $jwt;
					} else {
						return "gagal menyimpan data";
					}
				}
			}
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	public function check_jwt($jwt)
	{
		// Cek dahulu apakah JWT yang dikirim sama dengan yang disimpan dalam database
		$content = json_decode(file_get_contents($this->file), true);
		if (in_array($jwt, $content)) {
			echo $jwt;
			echo "<br><br>";
			echo "JWT sesuai.";
		} else {
			echo $jwt . PHP_EOL;
			echo "<br><br>";
			echo "JWT tidak sesuai.";
		}
	}
}
