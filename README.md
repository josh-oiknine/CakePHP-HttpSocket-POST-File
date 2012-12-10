CakePHP-HTTPSocket-POST-File
============================

Extension of the CakePHP HTTPSocket Class with additional functionality for POSTing files

Usage
=====

1.  Import the file in your Model or Controller:
        App::uses('HttpSocketWithFile', 'Vendor');
2.  Instantiate the class:
		$HttpSocketWithFile = new HttpSocketWithFile();
3.  Use as normal with the additional method for posting a file:

		$postData = array(
            'file'     => array('asset'=>'path/to/my/file'),
            'api_key'  => 'nhln3djhHKkjdfpPINLConlafs8koiLKDOISLilkdsljasdf',
            'username' => 'myUserName',
        );

        $response = $HttpSocketWithFile->postFile("http://myurl.com", $postData);

Keep in mind that the POST data must include an associative array of files to POST with the key being the field name and the value being the full path to the file.