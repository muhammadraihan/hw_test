<?
for($i=1; $i<=100; $i++){
    echo $i;
    if($i%3 == 0 && $i%5 == 0){
        echo "TigaLima";
    }elseif($i%3 == 0){
        echo "tiga";
    }elseif($i%5 == 0){
        echo "lima";
    }
}
?>