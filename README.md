# MailDispatcher
<h1>Usage:</h1>

<pre><code>

 //Create new template and set param to substitute in template
$template = (new Template ())
	->setTemplateName ( "test" )
	->addKeyVal ( (new KeyVal ())
		->setKey ( "Name" )
		->setVal ( "Mauro" ) )
	->addKeyVal ( (new KeyVal ())
		->setKey ( "Surname" )
		->setVal ( "Cerone" ) )
	->addKeyVal ( (new KeyVal ())
		->setKey ( "NickName" )
		->setVal ( "ceronem" ) );
//Create contact, FROM and A
$a = (new Contact ())->setAddress("cerone.m@stesi.eu");
$from = (new Contact())->setAddress("mauro.cerone@gmail.com");
//Add contact and template to Email object
$email = (new Email())
	->setTemplate($template)
	->setFrom($from)
	->addA($a)
	->setSubject("Test Email");
//Add email to the send queue
STeSI\MailDispatcher\Mailer::addMailToSend($email);
//Send all mail in send queue
STeSI\MailDispatcher\Mailer::startSendOperation();

</code></pre>