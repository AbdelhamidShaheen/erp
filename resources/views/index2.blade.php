
<html>
    <head>
<title>home page</title>
    </head>
    <body>

    <script src="{{ asset('/js/app.js') }}" ></script>
        <h1 id="view">ss</h1>
        <script>







window.Echo.channel("password-change").listen("PasswordChanged",(e)=>{

alert(e.message);
document.getElementById("view").innerHTML=e.message;
});
        </script>

    </body>
</html>

