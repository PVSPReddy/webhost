onAppStart();
function onAppStart()
{
    var x = document.getElementById("listview");
    var y = document.getElementById("lvtemplate");
    x.removeChild(y);
    localStorage.setItem("hello", y);
   // x.removeChild(y);
    for(var i= 0; i<10; i++)
        {
            var z = y.cloneNode(true);
           // z.id = "listdata";
            x.appendChild(z);
            //var p =  localStorage.getItem("hello");
            //var q =  localStorage.getItem("hello");
        }
   // x.appendChild(y);
};