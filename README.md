A detailed report for the project with screenshots : https://onedrive.live.com/view.aspx?resid=4A2F3CAC1BBE22C!118&ithint=file%2Cdocx&authkey=!AABsuQ69m3ZCl38&fbclid=IwAR1a01NjLik9-B96oIdB8NDSZ8pJjPaXn_d5YUhUxbH6HkPNXjGWMONlq1M


To kick-start the application, you need first to run the following commands:
-***compose install***
-***npm install***
-***php artisan migrate*** (after creating the database to which the migration is performed and changing the database information in the ***env*** file)
-***php artisan db: seed***
-***php artisan serve***

For email verification, you need to create a mailtrap account in
https://mailtrap.io/, -an email testing website to help developers during the development phase of an application-
they will provide you with some credentials to add in the ***env*** file,  which will allow you to send a verification message to your virtual inbox on the site after every registering process.
