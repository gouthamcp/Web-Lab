<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh"content="1"/>
    <style>
        p {
            color:white;
            font-size:90px;
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
        }
        body{ background-color:black;}
        </style>
        <p><?php echo date_timezone_get("h:i:s A");?></p>
    </head>