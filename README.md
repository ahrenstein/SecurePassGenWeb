Secure Password Generator (Web Version)
==============

I originally wrote this "software" in C# but that means it is limited to Windows users. That's no good, especially since I use a Mac. I decided to rewrite it in PHP so sys admins can run their own page, and use their OS of choice.

Using the site
------------

The first string is the fully qualified domain name (FQDN) of the server. (ie: mysql0017.server.doe.gov) The second string is a unique phrase (Seed Text) that you must keep secret.
This string should always be the same. The Seed Text string is the phrase that when combined with the FQDN produces a DoE compliant password. It's the same password every time, so whoever knows the Seed String, can gain root on any server you use this on.
In 180 days just change the Seed Text, and update the password on all of the servers.

Is this secure?
---------------

The short answer?  
![no](readme-no.png)

The long answer?  
This type of password generation is completely frowned upon by anyone who knows what they're doing. This repo existed
for a very specific purpose to fulfill a requirement that no longer exists because it was terrible.  
**USE [1PASSWORD](https://1password.com/)**

What is a DoE compliant password?
------------

A DoE compliant password has a bunch of requirements:
1. Password contains at least eight non-blank characters, provided such passwords are allowed by the operating system or application.
2. Password contains a combination of letters (a mixture of upper, and lowercase), numbers, and at least one special character within the first seven positions, provided such passwords are allowed by the operating system or application.
3. Password contains a nonnumeric in the first, and last position.
4. Password does not contain the user ID. (Note: My tool obviously cannot enforce this)
5. Password does not include the user’s own or, to the best of his/her knowledge, close friends or relatives names, employee serial number, Social Security number, birth date, phone number, or any information about him/her that the user believes could be readily learned or guessed. (Note: My tool obviously cannot enforce this either)
6. Password does not, to the best of the user’s knowledge, include common words that would be in an English dictionary, or from another language with which the user has familiarity.
7. Password does not, to the best of the user’s knowledge, employ commonly used proper names, including the name of any fictional character or place. (Sorry no Dalek themed passwords)
8. Password does not contain any simple pattern of letters or numbers, such as “qwertyxx” or “xyz123xx.”
9. Password employed by the user on his/her unclassified systems is different than the passwords employed on his/her classified systems. (Up to you to enforce)

Yup that's a lot of requirements. DoE is in charge of nuclear research though, and I've never had an issue remembering the few passwords I used daily, so it's not too bad.

Special Notes
------------

Due to differences between C#, and PHP this tool will generate different passwords than the original Windows application. This may be something that is correctable, but
I am not a programmer by trade, and I don't feel it is necessary to look for a fix for this. As an open source tool, you are welcome to fork the project, and fix it if you'd like.

References
------------

Based on the original here - https://github.com/ahrenstein/SecurePassGenLite


Vagrant
------------
You can use the simple Vagrantfile setup to quickly get a local version of the site online to test out. Keep in mind that the vagrant box will have logs so it should not be treated as secure.
