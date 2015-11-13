<?php

set_include_path(
		realpath("./libs") .
		PATH_SEPARATOR . get_include_path()
);

require_once 'GPG.php';


	function getTestKey(){
		return "-----BEGIN PGP PUBLIC KEY BLOCK-----
Version: GnuPG v1

mQENBFZFT6cBCADiW9BrrCwbh1dODXafu8EKysUCIfS1vNOSDPq4c1yy0rNsnsJH
PnYrahYpEtrvRJzsbsAQaiLBdNAwILj5YfObtB4Xl0M2tXROhS+8fDxPrgDksHlE
TbUQoVePn6gs+quPJFzNRzhEZQJoxdlxHHYZWpb6RJwVjr2I32g6fZA7P3erGToG
FO89Jioy6OVxUhyimQPwYC6vhvyTJ0RMmuUW2chE/N8ozds5uqm3uIMmwKIM7y1F
J1xG6YW966Lb06Zn7leRwridE7Vx1RnYEmxForSGxo5fOV5PUJoXH8cd2DqSkfP5
wkQDsi3K7k2SymOz0XqMpIYPMLlcYaZ2NOtxABEBAAG0JlJhZWQgUEhQIChGb3Ig
UEhQIFRFU1QpIDxyYWVkQHJhZWQuaXQ+iQE4BBMBAgAiBQJWRU+nAhsDBgsJCAcD
AgYVCAIJCgsEFgIDAQIeAQIXgAAKCRCsbhKLhwoEo/e1B/9fftHVZ5DQgrKdNNro
bkxzbY1W/ThBg84JnOPNBYlJovH5zSjQqIOVAWryDyg5dz4HcnxQPrb61fJTcGcZ
rfzGJTMuYuDQSV+E3zEfiF7oUqZD6zR0Y3P3Gls/F2ujncgFxHMt4LAXqovqqFWU
0VbdSle8qnmcwVfo/3ksY4w8T+2uSO8UA4FufJgc2ZAUNSAk0HxDGaPSDLtGpND/
0MDi1eue7QUw797lKOC+JJLNkv2s82yIJtv1uiptrkpNZ4Ns9TrA5PpSdn+iMxPt
EfISS5bsakyXvc3tdKR911lh13gS3G7/sIZXS9bIuuBKmqYqg6TM8vVEsA7Eo0hR
6z8KuQENBFZFT6cBCADXarY5juJCZOjmZyZrkhliHfkmYjH1cS3wCzydAmndJrla
llelOhK0sGWsB2ZZ8s5w9BacZGpAa8CLrv2alVRPP1hbt0UCzGuLIk1eAIWldBVE
rZ1cAyEZUuVQHLj0PN/KwXCQlSDAFcCPMHVB9RowHYMPjbuwqu9LCfdv/UX8jCkz
U4g55ZnKXKlRFgtsI529dChi2DpuWV323OkPkZVO1A8WWY+IVSLYkM6x2/IhB3su
kCDviy/dASbXbenPN69+orOU0mkAUOhI4BzHw9SUrm1hpVK0NlknSK+WhUnomo5F
a18ALB7szXbUJ5I/+537Dymgbth5UfSDgIU7pgeHABEBAAGJAR8EGAECAAkFAlZF
T6cCGwwACgkQrG4Si4cKBKOIaAgAt9ReTYIVQCB6qWkJKy4wD8vr8cRFLIQK9lAU
gAorBt6uQ1i9sTLVmqb61BEAsmU8SGKFwQLmawmf279r+m9AH/LVXf3RXqjt4AC/
a0e/7J3efyPhV7kYZgkZEGq4pba+BKmO4ME5VGY05dIomxDru/+i5+0uNPIa67fH
gV5Hh1aRyiM8/lAB9dyYPy0e7A8ztM7YqPMrMuMpvQFvZdmk2UBFe3np83CNxW2Q
RoMQu3p3o3TYWZ6Y9MzS3tkKCC7bdTg66yMXrnIeRtdCsJmHvZCPf67pcP7XGvZv
k7fCyFxgJDBh1bmlNimXk3Ed+M433DDaOg2VXCu09mSfsrY7jg==
=JwDk
-----END PGP PUBLIC KEY BLOCK-----";
	}

		
		$public_key_ascii = getTestKey();
		$plain_text_string  = "Hello World!";

		$gpg = new GPG();
		$pub_key = new GPG_Public_Key($public_key_ascii);
		$encrypted = $gpg->encrypt($pub_key,$plain_text_string);


		echo $encrypted;



?>