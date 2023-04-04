var offset=0;
var arrayindex=0;
var x="s/%aman%saman";
var escapeav=false;
var lastoffset;
var m=[];
var y;
var number=(x.split("%").length - 1);
for(var z=0;z<=number;z++)
{
    if(z === number)
    {
        m[arrayindex]=x.substring(offset,x.length);
        console.log(offset)
        break;
    }
    y=x.indexOf("%",offset);
    escapecheck:
        if(x.substring(y-1, y) === "/")
        {
            escapeav=true
            lastoffset=offset
            offset = y+1;
            console.log("escapefound")
            console.log(offset)
            y = x.indexOf("%",offset);
            z++;
            break escapecheck;
        }
    if(escapeav === true)
    {
        m[arrayindex]=x.substring(lastoffset, y);
        lastoffset = offset
        offset = y+1;
        console.log(offset)
        arrayindex++;
        continue
    }
    m[arrayindex]=x.substring(offset,y);
    lastoffset=offset
    offset=y+1;

    console.log(offset)
    arrayindex++;
}
console.log(m);