Drop your pictures to photos folder

#Configuring email
This gallery uses `mail` to send emails. You should configure it for your system, here is example for yum based systems:

	yum install mailx
	vi /etc/mail.rc
	set smtp=smtps://smtp.gmail.com:465
	set smtp-auth=login
	set smtp-auth-user=mail@gmail.com
	set smtp-auth-password=password
	set ssl-verify=ignore
	set nss-config-dir=/etc/pki/nssdb/