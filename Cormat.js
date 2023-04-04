class Cormat {

    static MainSeprator = '%';
    static DoubleSeprator = '|';
    static MainEscape = "/";
    static DoubleEscape = "/";
    static Data = '';

    static ExploreMain()
    {
        const intoPairs = xs => xs.slice(1).map((x, i) => [xs[i], x])
        const breakAt = (places, str) => intoPairs([0, ...places, str.length]).map(
            ([a, b]) => str.substring(a, b)
        )
        const breakWhere = (words, str) => breakAt(
            words.slice(0).sort(({offset: o1}, {offset: o2}) => o1 - o2).reduce(
                (a, {offset, length}) => [...a, offset, offset + length],
                []
            ),
            str
        )
        var inuse = this.Data;
        var encoded ;
        var indeed;
        var count = inuse.split(this.MainSeprator).length - 1;
        for(var i = 1; i <= count; i++)
        {

            var pos = inuse.indexOf(this.MainSeprator);
            var splitted = breakWhere([{offset: pos -1 , length: 1}], inuse);
            inuse.substring();
            if(splitted === this.MainEscape)
            {
                indeed = indeed.split()
                $i--;
            }
        else
            {
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