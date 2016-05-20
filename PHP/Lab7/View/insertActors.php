<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Actor Update</title>
    </head>
    <body>
        <h1>Insert Actor:</h1>
        <form id="formInsert" name="formInsert" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p>
		<label>First Name:
                    <input type="text" name="firstName" id="firstName" value=""/>
                </label>
            </p>
            <p>
		<label>Last Name:
                    <input type="text" name="lastName" id="lastName" value=""/>
                </label>
            </p>
            <p>
                <input type="submit" name="InsertBtn" id="InsertBtn" value="Insert" onclick="return confirm('Really Insert?')"/>
            </p>
        </form>
    </body>
</html>