<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="UTF-8">

        <script src="/javascript/valid-date.js" async></script>
        
    </head>
    <body>
        <header>
            <img src="./images/logo.png" width="130" height="80" alt="Place Genie Logo">
            <div>
                <a href="">Be a genie</a>
                <a href="pages/signup.html">Sign up</a>
                <a href="pages/login.html">Log in</a>
            </div>
        </header>

        <section id="search">
            <!-- TODO: set the action correctly -->
            <form action="action_search.php" method="get">
                <fieldset>
                    <legend>Wish for a place</legend>
                    <label>Where<input type="search" placeholder="Your dreams"></label>
                    <label>Check-in<input id="check-in" type="date" value="<?php echo date('Y-m-d');?>"></label>
                    <!-- TODO: set default value to the day after the current date -->
                    <label>Check-out<input id="check-out" type="date" value="<?php echo date('Y-m-d');?>"></label>
                    <label>Guests<input type="number" value="1" min="1" max="20"></label>
                    <input type="submit" value="Make a wish">
                </fieldset>
            </form>
        </section>

        <footer>
            <p>&copy; Place Genie, LTW-2019</p>
            <p>Bernardo Santos, Margarida Cosme, Vítor Gonçalves</p>
        </footer>
    </body>
</html>