<?php
global $local;
   function get_base_url(){
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';
        $path = $_SERVER['PHP_SELF'];
        $path_parts = pathinfo($path);
        $directory = $path_parts['dirname'];
        $directory = ($directory == "/") ? "" : $directory;
        $host = $_SERVER['HTTP_HOST'];
        return $protocol . $host . $directory;
    }

    $local = get_base_url()."/";
function local(){
   global $local;
    echo $local;
}
function startLink($file){
        $oldlink = get_option('home');
        $pagename =  basename($file);
        update_option( 'home', get_base_url().'/'.$pagename );
}

function endLink(){
    update_option( 'home', get_base_url() );
}
function checkPage($page = ''){
$check = false;
    if (strpos($_SERVER["REQUEST_URI"] ,'?') == false){
        $pgar = str_replace('.php', '', explode('/', $_SERVER["SCRIPT_NAME"]));
        $pgar = array_filter( $pgar);
        $pgar = end( $pgar);
        if($pgar) $check = $pgar == $page ? true : false;

    }else{
        $filename = str_replace('.php', '',basename($_SERVER["REQUEST_URI"]));


        if (strpos($page ,',') !== false) {
            $pages = explode(',', $page);

            foreach ($pages as $pg => $value) {

               if($filename == $value){
                $check = true;
               }
            }
        }else{

            if($page == $filename){
                $check = true;
            }
        }
    }
    echo ($check) ? 'atual' : '';
}

function seCatArq($valor){
    if(@$_GET['arquivo']){
        $testval = $_GET['arquivo'];
    }
    if(@$_GET['tag']){
        $testval = $_GET['tag'];
    }
    if(@$_GET['categoria']){
        $testval = $_GET['categoria'];
    }
    if($testval == $valor){
        echo 'atual';
    }
}

?>