<?php


class Cormat
{
    public $Data = '';
    public $MainSeprator = '%';
    public $DoubleSeprator = '|';
    public $MainEscape = "/";
    public $DoubleEscape = "/";
    public function ExploreMain(): array
    {
        $offset = 0;
        $inuse = $this->Data;
        $encoded = array();
        $count =  substr_count($this->Data, $this->MainSeprator);
        for($i = 1; $i <= $count; $i++)
        {
            $pos = stripos($inuse, $this->MainSeprator, $offset);
            if(substr($inuse, $pos - 1, 1 ) == $this->MainEscape)
            {
                $offset += $pos + 1;
                $i--;
            }
            else
            {
                $offset = 0;
                echo $inuse."\n";
                if($pos == false)
                {
                    echo $inuse;
                    array_push($encoded, $inuse);
                    break;
                }
                $npos = substr($inuse, 0 ,$pos);
                array_push($encoded, $npos);
                $inuse = substr($inuse, $pos + 1 ,strlen($inuse));
                if($count == $i)
                {
                    echo $inuse;
                    array_push($encoded, $inuse);
                    break;
                }
            }
        }
        return $encoded;
    }
    public function ExploreDouble(array $Decoded): array
    {
        $decoded = array(array());
        for ($j = 0; $j < count($Decoded); $j++) {
            $offset = 0;
            $inuse = $Decoded[$j];
            $encoded = array();
            $count =  substr_count($Decoded[$j], $this->DoubleSeprator);
            for($i = 1; $i <= $count; $i++)
            {
                $pos = stripos($inuse, $this->DoubleSeprator, $offset);
                if(substr($inuse, $pos - 1, 1 ) == $this->DoubleEscape)
                {
                    $offset += $pos + 1;
                    $i--;
                }
                else
                {
                    $offset = 0;
                    echo $inuse."\n";
                    if($pos == false)
                    {
                        array_push($encoded, $inuse);
                        break;
                    }
                    $npos = substr($inuse, 0 ,$pos);
                    array_push($encoded, $npos);
                    $inuse = substr($inuse, $pos + 1 ,strlen($inuse));
                    if($count == $i)
                    {
                        array_push($encoded, $inuse);
                        var_dump($encoded);
                        break;
                    }
                }
            }

        }
        return $decoded;
    }
    public function EscapeMain()
    {

    }
    public function EscapeDouble()
    {

    }
}
class CStructure
{

}
$c = new Cormat();
$c->Data = "amir|dfbd%xdvzsfd|sfg";
$decodemain = $c->ExploreMain();
var_dump($decodemain);
$sec = $c->ExploreDouble($decodemain);




