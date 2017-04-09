function validateData()
{
    var x = document.forms["logForm"]["logUName"].value;
    var y = document.forms["logForm"]["logUPwd"].value;
    var pass = false;
    if (x == "") 
    {
        alert("Name must be filled out");
        return false;
    }
    else if(y == "")
    {
        alert("Password must be filled out");
        return false;
    }
    else
    {
        return true;
    }
};