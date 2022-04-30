
<?php
   require __DIR__.'/vendor/autoload.php';

   use Kreait\Firebase\Factory;
   use Kreait\Firebase\ServiceAccount;

   // This assumes that you have placed the Firebase credentials in the same directory
   // as this PHP file.
   $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/parking-fc960-firebase-adminsdk-9phbm-2be1cdc090.json');
   $firebase = (new Factory)
      ->withServiceAccount($serviceAccount)
      ->withDatabaseUri('https://parking-fc960-default-rtdb.firebaseio.com')
      ->create();
      
   $database = $firebase->getDatabase();
?>
