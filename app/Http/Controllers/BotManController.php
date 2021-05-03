<?php
  
namespace App\Http\Controllers;
  
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
  
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
  
        $botman->hears('{message}', function($botman, $message) {
            
            if ($message == 'hi') {
                $this->askName($botman);
            }elseif(strpos($message , 'creer un compte'))
            {
                $botman->reply("L'operation d'identification est tres tres simple , vous trouvez tous dans le Navbarre , Merci !");
            }elseif(strpos($message , 'rediger un rapport'))
            {
                $botman->reply("Vous devez d'abord créer un dossier médical, puis vous trouverez cette option dans le panneau de control , Merci !");
            }
            else{
                $botman->reply("write 'hi' for testing...");
            }
  
        });
  
        $botman->listen();
    }
  
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
  
            $name = $answer->getText();
  
            $this->say('Nice to meet you '.$name);
        });
    }

}