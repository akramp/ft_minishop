<?PHP
if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] !== "OK")
 { 
 	echo "ERROR\n";
 	 return ;
  }
  $pwd = hash('whirlpool', $_POST['passwd']);
  $login = $_POST['login'];
  $picture = $_POST['pic'];
  $new = array( "login" => "$login", "passwd" => "$pwd", "pic" => "$picture");
   if (!file_exists("../private") || !file_exists("../private/passwd"))
    {
     mkdir ("../private");
     $tab = array($new);
    }
    else 
    { 
    	$tab = unserialize(file_get_contents("../private/passwd"));
    	 foreach ($tab as $elem) 
    	 	if ($elem['login'] === $login) 
    	 	{ 
    	 		echo "ERROR user $login alrady exist\n"; 
    	 		return ;
    	 	}
 		 $tab []= $new; 
	}
	$tab = serialize($tab);
	file_put_contents("../private/passwd", $tab);
	
  include"index.php";