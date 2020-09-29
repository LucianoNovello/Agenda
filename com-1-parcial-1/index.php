<?php require 'header.php'; ?>

<div class="login">

    <form action="login.php" method="POST">

        <h1 class="uk-text-center">Task manager</h1>

        <div class="uk-margin">
            <label for="user">User</label>
            <input type="email" name="user" class="uk-input"/>
        </div>

        <div class="uk-margin">
            <label for="">Password</label>
            <input type="password" name="pass" class="uk-input" />
        </div>

        <button type="submit" class="uk-button uk-button-primary">Enviar</button>

    </form>

</div>


<?php require 'footer.php'; ?>