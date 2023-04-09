<?php


class Cormat
{
    public $Data = '';
    public $MainSeperator = '%';
    public $DoubleSeperator = '|';
    public $MainEscape = "/";
    public $DoubleEscape = "/";
    public function ExploreMain(): array
    {
        $offset = 0;
        $inuse = $this->Data;
        $encoded = array();
        $count =  substr_count($this->Data, $this->MainSeperator);
        for($i = 1; $i <= $count; $i++)
        {
            $pos = stripos($inuse, $this->MainSeperator, $offset);
            if(substr($inuse, $pos - 1, 1 ) == $this->MainEscape)
            {
                $offset += $pos + 1;
                $i--;
            }
            else
            {
                $offset = 0;
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
                    break;
                }
            }
        }
        return $encoded;
    }
    public function ExploreDouble(array $Decoded): array
    {
    	$is_double_escaped = false;
    	if(str_contains($Decoded[0], $this->DoubleEscape.$this->DoubleSeperator))
    	{
    		foreach($Decoded as $key=>$item)
    		{
    			$Decoded[$key] = str_replace($this->MainDoubleEscape, "", $item);
    		}
    		$is_double_escaped = true;
    	}
    	$Decoded2 = array();
    	foreach($Decoded as $item)
    	{
    		array_push($Decoded2, explode($this->DoubleSeperator, $item));
    	}
    	return $Decoded2;
    }
    public function EscapeMain()
    {
    	if(str_contains($this->Data, $this->MainEscape.$this->MainSeperator))
    	{
    		return;
    	}
    	return str_replace($this->MainSeperator, $this->MainEscape.$this->MainSeperator, $this->Data);
    }
    public function EscapeDouble($Decoded)
    {
    	if(str_contains($Decoded[0], $this->DoubleEscape.$this->DoubleSeperator))
    	{
    		return;
    	}
		$Decoded2 = [];
		foreach($Decoded as $item)
		{
			array_push($Decoded2, str_replace($this->DoubleSeperator, $this->DoubleEscape.$this->DoubleSeperator, $item));
		}
		return $Decoded2;
    }
}
$c = new Cormat();
$c->Data = "a|b%c|d";
$decodemain = $c->ExploreMain();
var_dump($decodemain);
$sec = $c->ExploreDouble($decodemain);
$s = $c->EscapeDouble($decodemain);
var_dump($s);


