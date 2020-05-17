<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>::BukuLapuk::</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>

    <body>
        
        <section>
            <div id="user-menu">
                <div id="login-section">Masuk</div>
                <div id="register-section">Daftar</div>
            </div>
        </section>

        <section>
            <div class="background-modal">
                <div class="logreg-container">
                    <div id="login-tab">
                        Masuk
                    </div>
                    <div id="register-tab" class="inactive">
                        Daftar
                    </div>
                    <div id="logincontainer">
                        <div class="login-form">
                            <input type="text" class="logreg-form inputbox" id="login-email" placeholder="Email">
                        </div>
                        <div class="login-form">
                            <input type="password" class="logreg-form inputbox" id="login-password" placeholder="Password">
                        </div>
                        <div class="login-form">
                            <div class="btn-group">
                                <div class="btn secondary-button" id="maybeLater-Login">
                                    <div class="sbtn-text">Nanti Saja</div>
                                </div>
                                <input type="submit" class="btn btn-primary" id="masuk-Login" value="Masuk">
                            </div>
                        </div>
                    </div>
                    <div id="registercontainer" hidden>
                        <div class="register-form">
                            <input type="text" class="logreg-form inputbox" id="register-email" placeholder="Username">
                        </div>
                        <div class="register-form">
                            <input type="text" class="logreg-form inputbox" id="register-email" placeholder="Email">
                        </div>
                        <div class="register-form">
                            <input type="password" class="logreg-form inputbox" id="register-password" placeholder="Password">
                        </div>
                        <div class="register-form">
                            <div class="btn-group">
                                <div class="btn secondary-button" id="maybeLater-Register">
        
                                    <div class="sbtn-text">Nanti Saja</div>
                                </div>
                                <input type="submit" class="btn btn-primary" id="daftar-Register" value="Daftar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/index.js"></script>
    </body>
