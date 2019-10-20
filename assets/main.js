
    var toggle=0;
    function opennav(){
        if(toggle == 0)
        {
            document.getElementById("menu").style.display = "block";
            console.log(toggle);
            toggle++;
        }
        else
        {
            toggle--;
            document.getElementById("menu").style.display = "none";
        }
    }
    