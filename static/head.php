<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Atom</title>
<style>
    html, body{
        height: 100vh;
        width: 100%;
        margin: 0;
        padding: 0;
    }
    *{
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 600;
        margin:0px;
        padding: 0px;
    }
    .jumbotron{
        text-align: center;
    }
    .w3-container{
        flex-direction: row;
    }
    li:hover{
        cursor: pointer;
    }

    #Login-div{
        display: none;
        text-align: center;
        width: 100%;
    }

    #Login-Form-Div{
        display: flex;
        justify-content: center;
        text-align: center;
        align-content: center;
    }
    table{
        text-align: center;
    }
    table thead td{
        color: #000;
    }
    table td{
        padding-right: 25px;
    }
    #all-user{
        display: flex;
        justify-content: center;
        align-content: center;
    }
    .div-Login{
        display: flex;
        justify-content: center;
        align-content: center;
        text-align: center;
    //background-color: #eee;
    }
    #Signup-div{
        width: 100%;
        display: none;
        text-align: center;
    }
    .w3-card-4{
        overflow: hidden;
        margin: 6px;
        width: 33%;
    }
    .w3-card-4:hover{
        cursor: pointer;
    }
    iframe{
        margin: auto;
        height: 100%;
        width: 100%;
    }
    #closeplayer{
        font-size: 35px;
        position: absolute;
        margin-left: 88%;
        color:lightcoral;
        margin-top: 10%;
    }
    #Video-Player{
        position: fixed;
        width: 100%;
        height: 100vh;
        display: none;
        background-color: rgba(0,0,0,0.9);
        bottom: 0;
    }
    #v-container{
        display:flex;
        width: 100%;
    }
    #ep-list{
        display: inline-flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    #ep-name{
        height: 50px;
        width:31%;
        background-color: #eee;
        opacity: 0.8;
        margin: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #anime-body{
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover !important;
        background-position: center;
        background-attachment: fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
    }
    #anime-name{
        opacity: 0.8;
    }
    #anime-search{
        display: none;
        width: 100%;
        border: none;
        font-size: 63px;
        text-align: center;
        background-color: #eee;
    }
    #no-ep{
        opacity: 0.8;
    }
    i:hover{
        cursor: pointer;
    }
    @media screen and (max-width:768px)
    {
        .w3-container{
            flex-direction: column;
        }
        .w3-card-4{
            width: 100%;
            margin: 0px;
            margin-top: 10px;
        }
        #ep-name{
            width: 42%;
            margin: 6px;
            font-size: 8px;
        }
        #anime-search{
            font-size: 36px;
        }
        .col-xs-3{
            width: auto;
        }
    }
    @media screen and (max-width:1040px)
    {
        #ep-name{
            margin: 6px;
            font-size: 11px;
        }
    }
</style>
