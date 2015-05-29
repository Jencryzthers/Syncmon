# Syncmon (LFTP Web Interface Monitor)

Monitor file transfers done by LFTP with few sweet options. This project is completely open-source you can do whatever you want with this project. I made this to simplify my download monitoring and Im adding feature overtime. it is really poor quality code (sorry) but im not looking for any optimzing yet, it was just a proof of concept/prototype, im looking to optimize it in the near future while adding most of my idea to it! 

A few feature list:
	
 * Monitor LFTP Transfers
 * Add transfert back to transfer queues
 * and more...

A few todo list:

 * @todo: add multilanguage support
 * @todo: add more complex security
 * @todo: optimize the whole thing
 * @todo: much more...


Here's the simple config for now !

(I'm planning to adding it to the web interface itself so its easier to edit)

```php
  define('ftp_server','');
  define('ftp_user_name','');
  define('ftp_user_pass','');

  define('remote_path_completed','/data/completed/');
  define('remote_path_sync','/data/sync/');
  define('local_path_completed','/data/user/Downloads');
  define('local_path_sync','/data/user/Sync');

  define('api_provider_link','');
  define('api_provider_key','');

  define('host_link','');
  define('version','');
```

### Stuff used to make this:

 To be added... (In progress...)
