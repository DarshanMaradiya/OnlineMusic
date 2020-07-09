<?php

namespace Encryption;

class Encryption{
	// @var
	// Store cipher method 
	private static $ciphering = "AES-128-CTR"; 
	  
	// @var
	// Use OpenSSl encryption method 
	private static $iv_length = 0;
	// @var
	private static $options = 0; 
	
	// @var
	// Non-NULL Initialization Vector for encryption 
	private static $encryption_iv = 'F0E1D2C3B4A59687';//1125899906842624;


	public static function encrypt_id($id)
	{
		self::$iv_length = openssl_cipher_iv_length(self::$ciphering);
		// Store the encryption key
		$encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
		  
		// Encryption of string process starts 
		$encrypted_id = openssl_encrypt($id, self::$ciphering, 
		        	$encryption_key, self::$options, self::$encryption_iv);

		return $encrypted_id;
	}

	public static function decrypt_id($encrypted_id)
	{  
		self::$iv_length = openssl_cipher_iv_length(self::$ciphering);
		// Store the decryption key 
		$decryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
		  
		// Descrypt the string 
		$decrypted_id = openssl_decrypt ($encrypted_id, self::$ciphering, 
		            $decryption_key, self::$options, self::$encryption_iv); 

		return $decrypted_id;
	}
}

?>