{% extends 'template/header.php' %}

{% block content %}

    <section class="dashboard-section">
        <div class="dashboard-body">
            <div class="dashboard-tables">
                <div class="dashboard-block" id="dashboard-block-transfer">
                    <a href="transfer" class="link-transaction">Transfer</a> 
                </div>

                <div class="dashboard-block" id="dashboard-block-deposit">
                    <a href="deposit" class="link-transaction">Deposit</a>  
                </div>

                <div class="dashboard-block" id="dashboard-block-withdraw">
                    <a href="withdraw" class="link-transaction">Withdraw</a>                    
                </div>

                <div class="dashboard-block" id="dashboard-block-statement">
                    <a href="transfer.php" class="link-transaction">Statement</a> 
                </div>
            </div>

        </div>
    </section>

{% endblock %}