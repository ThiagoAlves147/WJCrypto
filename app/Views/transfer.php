{% extends 'template/header.php' %}

{% block content %}

    <section class="login-container">
        <div class="login-section">
            <div class="login-title">
                <h1>Transfer</h1>
            </div>

            <div class="div-login-form">
                <form action="" class="login-form">
                    <label class="login-label">
                       <h6>Para quem deseja transferir?</h6> 
                        <input type="text" placeholder="CPF or Number account" class="login-input">
                    </label>

                    <label class="login-label">
                        <h6>Informe o valor que deseja transferir</h6>
                        <input type="text" placeholder="Value" class="login-input">
                    </label>

                    <div class="login-button" style="width: 100%;">
                        <button type="submit" class="transfer-cancel">Cancel</button>
                    </div>

                    <div class="login-button" style="width: 100%;">
                        <button type="submit" class="transfer-continue">Continue</button>
                    </div>
                </form>

            </div>

        </div>
    </section>

{% endblock %}